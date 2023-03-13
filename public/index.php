<?php
use App\Controller\ExceptionController;
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../vendor/autoload.php';



$app = new \App\Framework\App();
try {
    $app->request();
} catch (Exception $e) {

    /**
     * @var ExceptionController $execptionController
     */
    $exceptionController = $app->getContainer()->get(ExceptionController::class);
    if ($e instanceof \App\Exception\NotFoundException) {
        $execptionController->pageNotFound();
        exit();
    }
    if ($e instanceof \App\Exception\ResourceNotFound) {
        $execptionController->resourceNotFound();
        exit();
    }
    echo "[500 OU AUTRES] TODO : handle exceptions";
    echo $e->getMessage();
}