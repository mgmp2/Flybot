<?php
  include_once "../libreria/dialogflow.php";
  require '../vendor/autoload.php';

  logIn("viajesbot", "miriamgmail97");

  use GuzzleHttp\Client;

  $client = new GuzzleHttp\Client(['base_uri' => 'https://test.interseguro.pe/travel-api/api/v1/']);
  $dataBot = new GuzzleHttp\Client(['base_uri' => 'https://api-flybot.herokuapp.com/api/']);
  // conexion a la bd FLYBOT+

  include "php/pregunta_frecuente.php"
  include "php/cotizar.php"
 ?>
