<?php
// Este será el punto de entrada siempre en nuestra aplicación web
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Incluimos el FrontController que es el controlador de inicio de la aplicación
require 'libs/FrontController.php';

//Lo iniciamos con su método estático main.
FrontController::main();

?>
