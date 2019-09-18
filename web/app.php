<?php

require_once(__DIR__."/../vendor/autoload.php");

$routing = array(
	'base_path' => '/',
	'routes'    => array(
		'home'      => array(
			'path'      => '',
			'action'    => 'Monolith\Acme\Controllers\MainController.getAction',
			'methods'   => 'GET',
			'roles'     => 'anonymous',
		),
	),
);

$routerlith = new \Monolith\Routerlith\Routerlith($routing);

$route      = $routerlith->getCurrentRoute();
$response   = $routerlith->dispatch($route, array());
