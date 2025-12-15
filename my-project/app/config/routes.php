<?php

use app\controllers\ApiExampleController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;
use app\controllers\ListeApiController;
use app\models\TrajetModele;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {
	$listecontroller = new ListeApiController();
	$router->get('/', [ $listecontroller, 'getListeParJour' ]);
	


	
	
}, [ SecurityHeadersMiddleware::class ]);