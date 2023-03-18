<?php

use App\Controller\ExceptionController;

require '../vendor/autoload.php';
require_once dirname(__DIR__) . '/config/const.php';

require '../vendor/autoload.php';
$app = new \App\Framework\App();

try {
    $app->request();
} catch (Exception $e) {

    /**
     * @var ExceptionController $execptionController
     */
    $exceptionController = $app->getContainer()->get(ExceptionController::class);
    if ($e instanceof \App\Exceptions\NotFoundException) {
        $execptionController->pageNotFound();
        exit();
    }
    if ($e instanceof \App\Exceptions\ResourceNotFound) {
        $execptionController->resourceNotFound();
        exit();
    }
    if($e instanceof \PDOException)
    {
     $execptionController->pdoException();
     exit();
    }
    echo "[500 OU AUTRES] TODO : handle exceptions";
    echo ' ' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine() . PHP_EOL;
}