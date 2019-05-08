<?php
  require '../vendor/autoload.php';

  use GuzzleHttp\Client;
  $client = new GuzzleHttp\Client(['base_uri' => 'https://test.interseguro.pe/travel-api/api/v1/']);
  $dataBot = new GuzzleHttp\Client(['base_uri' => 'https://api-flybot.herokuapp.com/api/']);
  $response = $client->request('GET', 'destinos/');


  $responsePost =$dataBot->request("GET", 'pregunta');

  $body = (string) $responsePost->getBody();

  echo $body;
  echo "<br>";
  echo "---------1------";
  echo "<br>";
  $body = json_decode($body, true);
  echo "<br>";
  echo $body;
  echo "<br>";
  echo(sizeof($body["preguntas"]));
  echo "<br>";
  echo "--------2-------";
  echo "<br>";
  echo $body["preguntas"][0]["sesionDF"];
  echo "<br>";
  $tamaño = (sizeof($body["preguntas"])) - 1;
  echo "-----3----------";
  echo "<br>";
  echo $tamaño;
  echo "<br>";
  echo $body["preguntas"][$tamaño]["sesionDF"];
  // require "../PHPMailer/Exception.php";
  // require "../PHPMailer/PHPMailer.php";
  // require "../PHPMailer/SMTP.php";
  // //
  // use PHPMailer\PHPMailer\PHPMailer;
  // use PHPMailer\PHPMailer\Exception(;
  //)
  //
  //
  // $oMail = new PHPMailer();
  // $oMail->isSMTP();
  // $oMail->Host="smtp.gmail.com";
  // $oMail->Port=587;
  // $oMail->SMTPSecure="tls";//protocolo de encriptacion
  // $oMail->SMTPAuth=true;
  // $oMail->Username="miriammp1997@gmail.com";
  // $oMail->Password="miriamgoogle97";
  // $oMail->setFrom('miriammp1997@gmail.com', 'Viaje Seguro'); // Nombre usuario
  // $oMail->addAddress("miriammp1997@gmail.com", '');
  //
  //   $username = "Miriam";
  //   $destino = "Europa";
  //   $canAdul = 1;
  //   $canNinos = 0;
  //   $fechaPartida = "24/02/2018";
  //   $fechaRetorno = "24/03/2018";
  //   $precio ="25.00";
  //   $nroPoliza = "123";
  //
  //   $cabecera = "¡Ahora eres parte de Viaje Seguro! | $nroPoliza";
  //   $oMail->Subject=$cabecera;
  //
  //   // Settin variables
  //   $message = file_get_contents(dirname(__FILE__).'/../mail/confirmation.html');
  //   $message = str_replace('%testusername%', $username, $message);
  //   $message = str_replace('%destino%', $destino, $message);
  //   $message = str_replace('%canAdul%', $canAdul, $message);
  //   $message = str_replace('%fechaPartida%', $fechaPartida, $message);
  //   $message = str_replace('%fechaRetorno%', $fechaRetorno, $message);
  //   $message = str_replace('%canNinos%', $canNinos, $message);
  //   $message = str_replace('%precio%', $precio, $message);
  //   // $message = str_replace('%testrandomkey%', $randomkey, $message);
  //   $oMail->msgHTML($message);
  //
  // if (!$oMail->send()) {
  //   echo"TodoBien | ";
  //
  //   echo $oMail->ErrorInfo;
  // } else{
  //   echo$oMail;
  // }
 ?>
