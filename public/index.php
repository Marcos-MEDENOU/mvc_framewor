<?php

/**
 * Front Controller
 * 
 * PHP version 8.1
 */

//  echo 'Requested URL = "' . $_SERVER['QUERY_STRING'] . '"';

require "../core/Router.php";
$router = new Router();

// echo get_class($router);

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

// Display the routing table
// echo '<pre>';
// var_dump($router->getRoutes());
// echo '</pre>';

// Match the requested route
$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
  echo '<pre>';
  var_dump($router->getParams());
  echo '</pre>';
} else {
  echo "No route found for URL '$url'";
}

$regex = "/^(?P<controller>[a-zA-Z]+)\/(?P<action>[a-zA-Z]+)$/";
preg_match($regex, "posts/index", $matches);

echo '<pre>';
var_dump($matches);
echo '</pre>';
