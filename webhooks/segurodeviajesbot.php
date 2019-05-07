<?php
  include_once "../libreria/dialogflow.php";
  require '../vendor/autoload.php';

  require  "../PHPMailer/Exception.php";
  require  "../PHPMailer/PHPMailer.php";
  require  "../PHPMailer/SMTP.php";

  use PHPMailer/PHPMailer/PHPMailer;
  use PHPMailer/PHPMailer/Exception;

  // $oMail = new PHPMailer();
  // $oMail ->isSMTP();
  // $oMail ->Host="smtp.gmail.com";
  // $oMail ->Port=587;
  // $oMail ->SMTPSECURE="tls";//protocolo de encriptacion
  // $oMail  ->SMTPAUTH=true;
  // $oMail->Username="miriammp1997@gmail.com";
  // $oMail->Password="miriamgmail97";
  // $oMail->setFrom('miriammp1997@gmail.com', 'Buen día');
  // $oMail->addAddress("miriammp1997@gmail.com", 'Prueba2');
  // $oMail->Subject("cabecera");
  // $oMail->msgHTML('Cuerpo del mensaje');
  //
  // if (!$oMail->send()) {
  //   echo $oMail->ErrorInfo;
  // }
  logIn("viajesbot", "miriamgmail97");

  use GuzzleHttp\Client;

  $client = new GuzzleHttp\Client(['base_uri' => 'https://test.interseguro.pe/travel-api/api/v1/']);
  $dataBot = new GuzzleHttp\Client(['base_uri' => 'https://api-flybot.herokuapp.com/api/']);
  // conexion a la bd FLYBOT

  include "php/pregunta_frecuente.php"
  include "php/cotizar.php"
 ?>
