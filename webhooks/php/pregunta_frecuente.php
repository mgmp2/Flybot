<?php
  global $id_sesion;

  if (intent_recibido("Default Welcome Intent")) {
    guardarSesionDF();
  }

  if(intent_recibido("Default Fallback Intent")) {
    enviar_texto("Ups, no he entendido a que te refieres. Pero, podemos generar una solicitud para que puedan responder a tu pregunta  lo más rápido posible. ¿Deseas que te generemos una solicitud?");
  }

  if(intent_recibido("Default Fallback Intent - yes")) {
    $nombreCliente = obtener_variables()["name"];
    $correo = obtener_variables()["email"];
    $telefono = obtener_variables()["phone"];
    $descripcion = obtener_texto();
  //
    $options = [
      'json' => [
        'datos'=> [
        	'nombreCliente'=> $nombreCliente,
        	'correo'=> $correo,
        	'telefono'=> $telefono
        ],
        "nivelSolicitud": "solicitudEspecifica",
        "descripcion": $descripcion
         ]
     ];
  //
    $responsePost =$dataBot->request("POST", 'solicitud');
  //
    enviar_texto("Su solicitud ha sido enviado, se ha enviado a $correo una copia de la solciitud. Pronto se contactaran contigo");
  }


/*                 FUNCIONES           */
function guardarSesionDF () {
  global $dataBot;
  $responsePregunta = $dataBot->request("GET", 'pregunta');
  $body = (string) $responsePregunta->getBody();
  $body = json_decode($body, true);
  $tamaño = (sizeof($body["preguntas"])) - 1;

  $session_id_df = $body["preguntas"][$tamaño]["sesionDF"];
  $session_id = obtener_session_id();

  if ($session_id !== $session_id_df) {
    $id_sesion = $session_id;
    $options = [
      'json' => [
        'sesionDF' => $session_id // enviar id_session de df actual
      ]
     ];
    $dataBot->post("pregunta", $options);
  }
}
 ?>
