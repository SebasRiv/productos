<?php 

    define('BASEPATH', true);

    require('system/config.php');
    require('system/core/autoload.php');

    /* Nivel de erores reportados */

    error_reporting(ERROR_REPORTING_LEVEL);

    /* Inicializando router valores del URI */

    $router = new Router();

    $controller = $router->getController();
    $method = $router->getMethod();
    $param = $router->getParam();

    /* Validación e inclusión del controlador y metodo */

    if (!CoreHelper::validateController($controller)) {
        $controller = 'ErrorPage';
    }
    
    require PATH_CONTROLLERS . "{$controller}/{$controller}Controller.php";
    $controller .= 'Controller';  
    
    if (!CoreHelper::validateMethodController($controller, $method)) {
        $method = 'exec';
    }

    $controller = new $controller();

    $controller->$method($param);

?>