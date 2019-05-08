<?php

  require "../PHPMailer/Exception.php";
  require "../PHPMailer/PHPMailer.php";
  require "../PHPMailer/SMTP.php";

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $oMail = new PHPMailer();
  $oMail->isSMTP();
  $oMail->Host="smtp.gmail.com";
  $oMail->Port=587;
  $oMail->SMTPSecure="tls";//protocolo de encriptacion
  $oMail->SMTPAuth=true;
  $oMail->Username="miriammp1997@gmail.com";
  $oMail->Password="miriamgoogle97";
  $oMail->setFrom('miriammp1997@gmail.com', 'Viaje Seguro'); // Nombre usuario

  function sendMail () {
    /* Datos a editar en mailing*/
    $username = "Miriam";
    $destino = "Europa";
    $canAdul = 1;
    $canNinos = 0;
    $fechaPartida = "24/02/2018";
    $fechaRetorno = "24/03/2018";
    $precio ="25.00";
    $nroPoliza = "123";

    $cabecera = "¡Ahora eres parte de Viaje Seguro! | $nroPoliza";
    $oMail->Subject=$cabecera;

    $oMail->addAddress("miriammp1997@gmail.com", '');
    // Settin variables
    $message = file_get_contents(dirname(__FILE__).'/../mail/confirmation.html');
    $message = str_replace('%testusername%', $username, $message);
    $message = str_replace('%destino%', $destino, $message);
    $message = str_replace('%canAdul%', $canAdul, $message);
    $message = str_replace('%fechaPartida%', $fechaPartida, $message);
    $message = str_replace('%fechaRetorno%', $fechaRetorno, $message);
    $message = str_replace('%canNinos%', $canNinos, $message);
    $message = str_replace('%precio%', $precio, $message);
    // $message = str_replace('%testrandomkey%', $randomkey, $message);
    $oMail->msgHTML($message);

    if (!$oMail->send()) {
      echo $oMail->ErrorInfo;
    }
  }

?>
