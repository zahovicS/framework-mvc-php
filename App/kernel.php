<?php
//other
require_once '../vendor/autoload.php';
//Libs
require_once dirname(__DIR__) . "/App/Configs/Configs.php";
require_once dirname(__DIR__) . "/App/Libs/Base.php";
require_once dirname(__DIR__) . "/App/Libs/View.php";
require_once dirname(__DIR__) . "/App/Libs/Controller.php";
require_once dirname(__DIR__) . "/App/Libs/Model.php";
require_once dirname(__DIR__) . "/App/Libs/Router.php";
require_once dirname(__DIR__) . "/App/Libs/Core.php";
// require_once dirname(__DIR__) . "/App/Libs/Request.php";
//Autload
spl_autoload_register(function ($clase) {
    require_once dirname(__DIR__) . "/App/Controllers/" . $clase . ".php";
    // require_once dirname(__DIR__) . "/App/Libs/" . $clase . ".php";
});
$router = new Router();
$web = new Web();
#LOGIN
$router->get('/', Login::class . "::index");
$router->post('/Login', Login::class . "::loger");
$router->post('/Login/logout', Login::class . "::logout");
#END LOGIN
#BUSINESS
// $router->get('/business/getBusiness', Business::class . "::getBusiness");
#END BUSINESS
#DASHBOARD
$router->get('/dashboard', Dashboard::class . "::index");
#END DASHBOARD
$router->addNotFoundHandler(function () use ($web) {
    $web->_404();
});
$router->run();