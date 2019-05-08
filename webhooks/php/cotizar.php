<?php
global $correo;

$canal_venta = '9';
/*************************************
  1. GENERAR CODIGO DE VENTA
*************************************/
// Para enviar una cotizacion
// 1. Generar codigoVenta: codigoDestino, fechaPartida, fechaRetorno, cantidadAdulto, cantidadNino, canalVenta
$response = $client -> request('GET', 'destinos/');
// CASTEANDO PARA VISUALIZAR destinos
$body = (string) $response->getBody();
// Mostrando tipo de dato
$body = json_decode($body, true);


// 1.a. Obtener $codigo_destino
if(intent_recibido("cotizar_seguro-destino")) {
  $destino = obtener_variables()["destinos"];
  enviar_texto("Entiendo que deseas cubrir el destino $destino. ¿Cuántos adultos y niños deseas asegurar?");
}

//1.b Obtener $cantidad_adulto y $cantidad_nino
if(intent_recibido("cotizar_seguro-pasajeros")) {
  global $cantidad_adulto;
  global $cantidad_nino;

  $disponibilidad_pasajeros = 9;
  $cantidad1 = obtener_variables()["cantidad1"];
  $pasajero1 = obtener_variables()["pasajero1"];
  $cantidad2 = obtener_variables()["cantidad2"];
  $pasajero2 = obtener_variables()["pasajero2"];

  if ($pasajero1 === "adulto") {
    $cantidad_adulto = $cantidad1;
    $cantidad_nino =  $cantidad2;
  } else if ($pasajero1 === "niño") {
    $cantidad_adulto = $cantidad2;
    $cantidad_nino =  $cantidad1;
  } else {
    enviar_texto("Disculpa, no entendí, si deseas reformular la cantidad de pasajeros escriba 'quiero cotizar'");
    return;
  }
  $total = $cantidad1 + $cantidad2;
  $total = (integer) $total;
  if ($total <= $disponibilidad_pasajeros) {
    if ($cantidad_adulto <= 0) {
      enviar_texto("Lo sentimos, el seguro cubre mínimo 1 adulto");
    }
  } else {
    enviar_texto("Lo sentimos solo podemos cotizar hasta 9 pasajeros por póliza, si deseas reformular la cantidad de pasajeros escriba 'quiero cotizar'");
    return;
  }
  enviar_texto("Cantidad tomada correctamente. Son $total pasajero(s). Antes de terminar, indícame el rango de fechas para el seguro de viaje.");
}

// 1.c Obtener $fecha_partida y $fecha_retorno
if(intent_recibido("cotizar_seguro-fechaIda_fechaVuelta")) {
  $fecha_partida = obtener_variables()["fecha_ida"];
  $fecha_retorno = obtener_variables()["fecha_vuelta"];
  validarFechas($fecha_partida, $fecha_retorno);
  // if(validarFechas($fecha_partida, $fecha_retorno)) {
  //   $date1 = new DateTime($fecha_partida);
  //   $date2 = new DateTime($fecha_retorno);
  //   enviar_texto('Entiendo que se irá por ' . $date1->diff($date2).' días. Por último, a qué correo te enviamos la información ?');
  // }
  $fecha_partida = date("d/m/Y", strtotime($fecha_partida));
  $fecha_retorno = date("d/m/Y", strtotime($fecha_retorno));
  // enviar_texto("Fecha de ida $f_ida y fecha retorno $f_retorno");
}

  // 1.d Obtener $correo
  if(intent_recibido("cotizar_seguro-correo")) {
     $correo = obtener_variables()["email"];
     global $cantidad_adulto;
     global $cantidad_nino;
     global $fecha_partida;
     global $fecha_retorno;

     $destino = obtener_variables()["destinos"];
     $cantidad1 = obtener_variables()["cantidad1"];
     $pasajero1 = obtener_variables()["pasajero1"];
     $cantidad2 = obtener_variables()["cantidad2"];
     $pasajero2 = obtener_variables()["pasajero2"];
     $fecha_partida = obtener_variables()["fecha_ida"];
     $fecha_retorno = obtener_variables()["fecha_vuelta"];

     $codigo_destino = obtener_codigo_destino($destino);
     if ($pasajero1 === "adulto") {
       $cantidad_adulto = $cantidad1;
       $cantidad_nino =  $cantidad2;
     } else if ($pasajero1 === "niño") {
       $cantidad_adulto = $cantidad2;
       $cantidad_nino =  $cantidad1;
     }

     $fecha_partida = (date("d/m/Y", strtotime($fecha_partida)));
     $fecha_retorno = (date("d/m/Y", strtotime($fecha_retorno)));
     $options = [
       'json' => [
         'canalVenta' => "9",
         'cantidadAdulto' => $cantidad_adulto,
         'cantidadNino' => $cantidad_nino,
         'codigoDestino' => $codigo_destino,
         'fechaPartida' => $fecha_partida,
         'fechaRetorno' => $fecha_retorno
          ]
      ];
     // $mensaje = "Codigo_destino $codigo_destino \n\n $cantidad_adulto adulto y $cantidad_nino niño \n\n FECHA PARTIDA $fecha_partida \n\n FECHA RETORNO: $fecha_retorno";
     $responsePost =$client->post("cotizaciones/", $options);
     $body = json_decode($responsePost->getBody(), true);
     $codigoVenta = $body["codigoVenta"];
     $options2 = [
       'json' => [
         'correo' => $correo,
         'idVenta' => $codigoVenta
          ]
      ];
      // la cantidad de niño cuando no ponga hay que validarf que se envnie 0
     $responsePost2 = $client->post("cotizaciones/enviarcotizacion", $options2);
     enviar_texto(" Toda la información se le enviará al $correo en pocos minutos. Muchas gracias :D!");

  }
  /*************************************
                  FUNCIONES
  *************************************/

  function obtener_codigo_destino($destino) {
    global $body;
    $destinos = $body['destinos'];
    foreach ($destinos as &$value) {
      $descripcion = $value['descripcion'];
      if ($destino === $descripcion) {
        echo $value['codigo'];
        return $value['codigo'];
      }
    }
  }

  function validarFechas($f1, $f2) {
    global $fecha_partida;
    $date1 = new DateTime($f1);
    $date2 = new DateTime($f2);
    $clone = clone $date1;
    $clone->modify( '+365 day' );

    $date_now = new DateTime("now");
    $minimo_dias = 5;
    $maximo_dias = 365;
    $diff = $date1->diff($date2);

    if($date1->format( 'Y-m-d') >= $date_now->format( 'Y-m-d')) {
      if ($diff->days >= $minimo_dias) {
        if ($diff->days <= $maximo_dias) {
          enviar_texto('Entiendo que desea cubriir el seguro durante ' . $diff->days.' días. Por último, a qué correo te enviamos la información ?');
        } else {
          enviar_texto('Te podemos cubrir por un plazo mínimo de 5 días hasta máximo 1 año, no '. $diff->days .' días');
          return;
        }
      } else {
        enviar_texto('Te podemos cubrir por un plazo mínimo de 5 días hasta máximo 1 año, no '. $diff->days .' días');
        return;
      }
    } else {
      enviar_texto('La fecha mínima de viaje debería ser la fecha actual, no '.  (date("d/m/Y", strtotime($fecha_partida))));
      return;
    }
  }
  // NOTA: es importante que se capture el ID del cliente para guardar la informacion necesario

 ?>
