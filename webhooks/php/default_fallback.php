<?php

if (intent_recibido("Default Welcome Intent")) { // Intencion de saludar, guardand id_dialogflow
  generarSesionDialogflow();
  enviar_texto("Buen día, soy Viaje Seguro bot. Estoy aquí para ayudarte en lo que necesites");
}

if(intent_recibido("Default Fallback Intent")) { // El bot no entendio!! ... Guardar datos en preguntas
  global $idCliente;
  global $descripcion;

  $idCliente = generarSesionDialogflow();
  $descripcion = obtener_texto();
  agregarPregunta($descripcion, $idCliente);

  enviar_texto("Ups, no he entendido a que te refieres. Pero, podemos generar una solicitud para que puedan responder a tu pregunta  lo más rápido posible. ¿Deseas que te generemos una solicitud?");

}

if(intent_recibido("Default Fallback Intent-yes")) {
  global $descripcion;
  $nombreCliente = obtener_variables()["name"];
  $correo = obtener_variables()["email"];
  $telefono = obtener_variables()["phone"];
  $options = [
    'json' => [
      'datos'=> [
        'nombreCliente'=> $nombreCliente,
        'correo'=> $correo,
        'telefono'=> $telefono
      ],
      'nivelSolicitud'=> 'solicitudEspecifica',
      'sesionDF'=> obtener_session_id()
       ]
   ];
  $responsePost =$dataBot->post('solicitud', $options);
  enviar_texto("Su solicitud se está generando. Antes de terminar, ¿Deseas agregar otra pregunta más para la solicitud?");
}

if(intent_recibido("Default Fallback Intent-yes-yes")) {
  $descripcion = obtener_variables()["descripcion"];
  $idCliente = generarSesionDialogflow();
  $correo = obtener_variables()["email"];
  $nombre = obtener_variables()["name"];
  $estadoSolicitud = "Su solicitud esta siendo procesada";
  $contenido_mail = "Pronto estaremos en contacto contigo.";
  agregarPregunta($descripcion, $idCliente);
  mailSolicitudEspecifica($estadoSolicitud, $correo, $nombre, $contenido_mail);
  enviar_texto("Su solicitud ha sido enviado con éxito, también se ha enviado $correo una copia de esta solicitud. Pronto se contactaran contigo.");
}

if(intent_recibido("Default Fallback Intent-yes-no")) {
  global $idCliente;
  global $correo;
  global $nombre;
  global $estadoSolicitud;
  global $contenido_mail;
  global $descripcion;

  $descripcion = obtener_variables()["descripcion"];
  $idCliente = generarSesionDialogflow();
  $correo = obtener_variables()["email"];
  $nombre = obtener_variables()["name"];
  $estadoSolicitud = "Su solicitud esta siendo procesada";
  $contenido_mail = "Pronto estaremos en contacto contigo.";
  agregarPregunta($descripcion, $idCliente);
  mailSolicitudEspecifica($estadoSolicitud, $correo, $nombre, $contenido_mail);
  enviar_texto("Tu solicitud ha sido enviado con éxito, también se ha enviado $correo una copia de esta solicitud. Pronto se contactaran contigo.");

}
/****************************************/
/*                 FUNCIONES            */
/****************************************/

function generarSesionDialogflow () {
  global $dataBot;

  $responsePregunta = $dataBot->request("GET", 'pregunta');
  $body = (string) $responsePregunta->getBody();
  $body = json_decode($body, true);
  $tamaño = (sizeof($body["preguntas"])) - 1;
  $session_id_df = $body["preguntas"][$tamaño]["sesionDF"]; //sesion guardada
  $session_id = obtener_session_id();

  if ($session_id_df !== $session_id) { //el id_df no existe
    $options = [
      'json' => [ 'sesionDF' => $session_id ] // enviar id_session de df actual
     ];
    $dataBot->post("pregunta", $options);
    return $session_id;
  } else { //si existe, no hay que guardar nada
    return $session_id_df;
  }
}

function agregarPregunta ($descripcion, $id_sesion) {
  global $dataBot;

  $options = [
    'json' => [ 'preguntas' => [ $descripcion ] ]
   ];
   $dataBot->put("pregunta/agregar/$id_sesion", $options);
  }


 ?>
