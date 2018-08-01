<?php

//incluir el archivo principal
include("../Slim/Slim.php");
include('funciones.php');

//registran la instancia de slim
\Slim\Slim::registerAutoloader();
//aplicacion 
$app = new \Slim\Slim();

$app->get('/',function() use ($app){
	$sql = "SELECT * FROM productos WHERE vigencia = 1";
	echo getSQL($sql);
})->setParams(array($app));

$app->get('/:idprod',function($idprod) use ($app){
	$id = $idprod;
	$sql = "SELECT * FROM productos WHERE idproducto = $id";
	echo getSQL($sql);
});

$app->post('/generar-xml', function () use ($app) {
    $json = $app->request->getBody();
    $data = json_decode($json, true); // parse the JSON into an assoc. array
	// do other tasks
	print_r($data);
});

//inicializamos la aplicacion(API)
$app->run();

