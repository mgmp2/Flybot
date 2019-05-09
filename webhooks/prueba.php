<?php
  require '../vendor/autoload.php';

  use GuzzleHttp\Client;
  $client = new GuzzleHttp\Client(['base_uri' => 'https://test.interseguro.pe/travel-api/api/v1/']);
  $dataBot = new GuzzleHttp\Client(['base_uri' => 'https://api-flybot.herokuapp.com/api/']);
  $response = $client->request('GET', 'destinos/');

use MongoDB\Client as Mongo;

$user = "mmendozap";
$pwd = 'miriamgmail97';

$mongo = new Mongo("mongodb://${user}:${pwd}@ds145146.mlab.com:45146");
$collection = $mongo->heroku_wjwdxbnf->collection;
$result = $collection->find()->toArray();

print_r($result);
  // use MongoDB\Driver\Manager;
  // use MongoDB\Driver\BulkWrite;
  // use MongoDB\Driver\Query;
  // // Iniciar conexion
  // $con = new Manager("mongodb://mmendozap:miriamgmail97@ds145146.mlab.com:45146/heroku_wjwdxbnf");
  // $manager = new MongoDB\Driver\Manager("mongodb://mmendozap:miriamgmail97@ds145146.mlab.com:45146/heroku_wjwdxbnf");
  //
  // var_dump($con);
  // $nombreCliente = "ccccccccc";
  // $correo = "ccccccccc";
  // $telefono = "ccccccccc";
  // $descripcion = "prueba";
  // //
  // $options = [
  //   'json' => [
  //     'datos'=> [
  //       'nombreCliente'=> $nombreCliente,
  //       'correo'=> $correo,
  //       'telefono'=> $telefono
  //     ],
  //     'nivelSolicitud'=> 'solicitudEspecifica',
  //     'descripcion'=> $descripcion
  //   ]
  //  ];
  // // //
  // $responsePost =$dataBot->post("solicitud", $options);
  // //
  // $body = (string) $responsePost->getBody();
  // //
  // echo $body;
  // echo "<br>";
  // echo "---------1------";

 ?>
