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
  $oMail->setFrom("miriammp1997@gmail.com", 'Viaje Seguro'); // Nombre usuario
  //
  $correo = "miriammp1997@gmail.com";
  $username = "Miriam";
  $destino = "Europa";
  $canAdul = 1;
  $canNinos = 0;
  $fechaPartida = "24/02/2018";
  $fechaRetorno = "24/03/2018";
  $precio ="25.00";
  $nroPoliza = "123";
  $desc_cobertura = "Datos Modificados**";
  // mailConfirmation();
  // mailSolicitudEspecifica($nroPoliza, $correo, $username, $desc_cobertura);
  // // function mailConfirmation ($correo, $username, $destino, $canAdul, $canNinos, $fechaPartida, $precio, $nroPoliza) {
  function mailConfirmation () {
    global $desc_cobertura;
    global $correo;
    global $username;
    global $destino;
    global $canAdul;
    global $canNinos;
    global $fechaPartida;
    global $fechaRetorno;
    global $precio;
    global $nroPoliza;
    global $oMail;

    $oMail->addAddress("$correo", '');

    $cabecera = "Viaje Seguro Bot | $desc_cobertura";
    $oMail->Subject=$cabecera;

    // // Settin variables
    $message = file_get_contents(dirname(__FILE__).'/../mail/confirmation.html');
    $message = str_replace('%testusername%', $username, $message);
    $message = str_replace('%destino%', $destino, $message);
    $message = str_replace('%canAdul%', $canAdul, $message);
    $message = str_replace('%fechaPartida%', $fechaPartida, $message);
    $message = str_replace('%fechaRetorno%', $fechaRetorno, $message);
    $message = str_replace('%canNinos%', $canNinos, $message);
    $message = str_replace('%precio%', $precio, $message);

    $oMail->msgHTML($message);
    $oMail->send();
  }


  function mailSolicitudEspecifica ($estadoSolicitud, $correo, $nombre, $contenido) {
    global $oMail;

    $oMail->addAddress("$correo", '');
    $oMail->addAddress("miriammp1997@gmail.com", '');

    $cabecera = "Interseguro | Viaje Seguro Bot";
    $oMail->Subject=$cabecera;

    // // Settin variables
    $message = file_get_contents(dirname(__FILE__).'/../mail/solicitud.html');
    $message = str_replace('%testname%', $nombre, $message);
    $message = str_replace('%testsesionid%', $estadoSolicitud, $message);
    $message = str_replace('%testcontenido%', $contenido, $message);

    $oMail->msgHTML($message);
    $oMail->send();
  }
?>
