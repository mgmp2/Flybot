<?php
  require '../vendor/autoload.php';

  use GuzzleHttp\Client;
  $client = new GuzzleHttp\Client(['base_uri' => 'https://test.interseguro.pe/travel-api/api/v1/']);
  $response = $client->request('GET', 'destinos/');

  // $responsePost = $client->post('cotizaciones/', [
  //   'body' => [
  //     'canalVenta': "1",
  //     'cantidadAdulto': 1,
  //     'cantidadNino': 0,
  //     'codeAnalytics': "VIASAFOCEA",
  //     'codigoDestino': "4",
  //     'codigoIntercorp': "INTERCORP10",
  //     'codigoPromocional': "",
  //     'codigoRemarketing': "",
  //     'fechaPartida': "24/04/2019",
  //     'fechaRetorno': "28/04/2019",
  //     'pantalla': 2,
  //     'viajeros': []
  //   ]
  // ]);

  $body = (string) $response->getBody();
  if(intent_recibido("cotizar_seguro-destino")) {
    $session_id = obtener_session_id();
    echo "<br>";
    echo "Codigo de usuario";
    echo "<br>";
    echo $session_id;
  }

  echo "<br>";
  echo "<br>";
  echo $body;
  echo "<br>";
  echo "---------------";
  echo "<br>";
  $body = json_decode($body, true);
  echo $body;
  echo $body['destinos'][0]['codigoAnalityc'];
  echo "<br>";
  echo "----------------------------------------------------------";
  echo "<br>";
  echo $body['destinos'];
  echo "<br>";
  echo "----------------------------------------------------------";
  echo "<br>";
  echo "CAPTURANDO ID DE DESTINO ";
  echo "<br>";
  // $destino = "Asia, África y Oceanía";
  // function obtener_codigo_destino($destino) {
  //   global $body;
  //   $destinos = $body['destinos'];
  //   foreach ($destinos as &$value) {
  //     $descripcion = $value['descripcion'];
  //     if ($destino === $descripcion) {
  //       echo $value['codigo'];
  //       return $value['codigo'];
  //     }
  //   }
  // }

  // obtener_codigo_destino("Asia, África y Oceanía");
  // obtener_codigo_destino("Europa");
  // echo "<br>";
  // echo "----------------------------------------------------------";
  // echo "<br>";
  //
  $date1 = new DateTime("2019-04-19T12:00:00-05:00");
  $date2 = new DateTime("2019-04-26T12:00:00-05:00");
  // $now = new DateTime("now");
  // $diff = $date1->diff($date2);
  // // will output 2 days
  // $clone = clone $date1;
  // $clone->modify( '+365 day' );
  // $diff2 = $date2->diff($clone);
  //
  // echo "<br>";
  // echo "FUNCION PARA VALIDAR FECHAS";
  // echo "<br>";
  // echo 'Diferencia de fechas: '.$diff->days . ' days ';
  // echo "<br>";
  // echo $date1->format( 'd-m-Y' ), "\n >> +365 días: << ", $clone->format( 'd-m-Y' );
  // echo "<br>";
  // echo $date1->format( 'd-m-Y' );
  // echo "<br>";
  // var_dump($diff->days <= $clone); //fecha de retorno dentro de los 365 días
  // echo "<br>";
  // var_dump($diff->days > 4); // fecha de retorno es mayor
  // // echo $diff2;
  // echo "<br>";
  // echo "string";
  // echo "<br>";
  // echo "------VALIDAR FECHAS---------";
  //
  //
  // $date3 = new DateTime("2019-04-21T12:00:00-05:00");
  // $date4 = new DateTime("2019-04-28T12:00:00-05:00");
  // $diff = $date3->diff($date4);
  // echo "<br>";
  // echo 'FECHA IDA: '.$date3->format( 'Y-m-d' );
  // echo "<br>";
  // echo 'FECHA VUELTA: '.$date4->format( 'Y-m-d' );
  // echo "<br>";
  // if ($date3->format( 'Y-m-d' ) < $date4->format( 'Y-m-d' )) {
  //   echo "correcto";
  // } else {
  //   echo "incorrecto";
  // }
  // echo "<br>";
  // echo $diff->days;
  // echo "<br>";
  // if($diff->days <= 5) {
  //   echo "Existe menos de 5 días de diferencia";
  // } else {
  //   echo "Dentro del rango permitido";
  // }
  // echo "<br>";
  // echo "Funcion!!!!!!!!!!!!!!!!!";
  // echo "<br>";
  // validarFechas("2019-04-26T12:00:00-05:00", "2019-05-28T12:00:00-05:00");
  //
  // function validarFechas($f1, $f2) {
  //   global $fecha_partida;
  //   $date1 = new DateTime($f1);
  //   $date2 = new DateTime($f2);
  //   $clone = clone $date1;
  //   $clone->modify( '+365 day' );
  //
  //   $date_now = new DateTime("now");
  //   $minimo_dias = 5;
  //   $maximo_dias = $clone;
  //   $diff = $date1->diff($date2);
  //
  //   if($date1->format( 'Y-m-d') >= $date_now->format( 'Y-m-d')) {
  //     if ($diff->days >= $minimo_dias) {
  //       echo '-'.$diff->days . 'dias con un mino de '.$minimo_dias.'dias';
  //       echo "<br>";
  //       if ($diff->days <= $maximo_dias) {
  //         echo 'Entiendo que se irá por ' . $diff->days.' días. Por último, a qué correo te enviamos la información ?';
  //       } else {
  //         echo 'Te podemos cubrir por un plazo mínimo de 5 días hasta máximo 1 año, no '. $diff->days.' días';
  //       }
  //     } else {
  //       echo 'Te podemos cubrir por un plazo mínimo de 5 días hasta máximo 1 año, no '. $diff->days.' días';
  //     }
  //   } else {
  //     echo 'La fecha mínima de viaje debería ser la fecha actual, no'.  (date("d/m/Y", strtotime($fecha_partida)));
  //   }
  // }
  echo $date1->format( 'd/m/Y');
  $options = [
    'json' => [
      'canalVenta' => "9",
      'cantidadAdulto' => 1,
      'cantidadNino' => 2,
      'codigoDestino' => "1",
      'fechaPartida' => "14/09/2019",
      'fechaRetorno' => "24/09/2019"
       ]
   ];
   echo json_encode($options);
  $responsePost =$client->post("cotizaciones/", $options);
  // $body = (string) $responsePost->getBody();
  //
  //
  echo "<br>";
  echo $responsePost->getBody();
  echo "<br>";
  $body = json_decode($responsePost->getBody(), true);
  echo "<br>";
  echo $body["codigoVenta"];
  // var_dump($responsePost);
  // echo $responsePost;
  // echo $responsePost->getStatusCode();
  // $contents = $responsePost->getBody()->getContents();
  // echo $contents;
  // var_dump($contents);
 ?>
