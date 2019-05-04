<?php
  include_once "../libreria/dialogflow.php";
  require '../vendor/autoload.php';

  logIn("viajesbot", "miriamgmail97");

  use GuzzleHttp\Client;

  $client = new GuzzleHttp\Client(['base_uri' => 'https://test.interseguro.pe/travel-api/api/v1/']);

  // conexion a la bd FLYBOT
  $mysqli = mysqli_connect("localhost", "mmendozap_flybot", "miriamgmail97", "mmendozap_flybot");
  if (!$mysqli) {
    echo "Error: nO SE PUDO CONECTAR A Mysql.".PHP_EOL;
    die();
  }


  include "php/cotizar.php"
 ?>
