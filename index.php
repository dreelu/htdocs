<?php
declare(strict_types= 1);

session_start();


$isLogged = isset($_SESSION['id']);


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require "router.php";

$router = new Router;

$router->add('/', function() use ($isLogged) {
    if ($isLogged) {
        header('Location: /main');
    } else {
        header('Location: /login');
    }
});
    
$router->add('/login', function() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require __DIR__ . '/php/controller.processaLogin.class.php';
        return;
    }

    require __DIR__ . '/php/login.php';
});

$router->add('/register', function() {
    require __DIR__ . '/php/register.php';
});

$router->add('/main', function() {
    require __DIR__ . '/php/main.php';
});

$router->add('/logout', function() {
    require __DIR__ . '/php/logout.php';
});


$router->dispatch($path);


?>
