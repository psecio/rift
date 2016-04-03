<?php
session_start();
require_once __DIR__.'/../vendor/autoload.php';

// See if we need to turn off XSS protection
$url = parse_url($_SERVER['REQUEST_URI']);
if (strstr($url['path'], '/xss') !== false) {
    header('X-XSS-Protection: 0');
}

spl_autoload_register(function($class) {
    $classFile = __DIR__.'/../'.str_replace('\\', '/', $class).'.php';
    if (is_file($classFile)) {
        require_once $classFile;
    }
});

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

$container = new \Slim\Container();
$container['view'] = function($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/../templates');
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));
    return $view;
};
$container['db'] = function($container) {
    $dsn = 'sqlite:'.__DIR__.'/../data/rift.db';
    return new \PDO($dsn);
};

$app = new \Slim\App($container);
$app->group('', function () use ($app) {
    $controller = new App\Controller\IndexController($app);

    $app->get('/', $controller('index'));
});

/** XSS Routes **/
$app->group('/xss', function () use ($app) {
    $controller = new App\Controller\XssController($app);

    $app->get('', $controller('index'));
    $app->get('/reflected', $controller('reflected'));
    $app->get('/stored', $controller('stored'));
    $app->post('/stored', $controller('addPost'));
    $app->get('/dom', $controller('dom'));
    $app->get('/delete/{id}', $controller('delete'));
});

$app->run();
