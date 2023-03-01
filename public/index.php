<?php
use App\Controller\ExceptionController;

$app = new \App\Framework\App();

try {
    $app->request();
} catch (Exception $e) {
    if ($e instanceof \App\Exception\NotFoundException) {

        /**
         * @var ExceptionController $instance
         */
        $instance = $app->getContainer()->get(\App\Controller\ExceptionController::class);
        $instance->pageNotFound();
        exit();
    }
    if ($e instanceof \App\Exception\ResourceNotFound) {

        /**
         * @var ExceptionController $instance
         */
        $instance = $app->getContainer()->get(\App\Controller\ExceptionController::class);
        $instance->resourceNotFound();
        exit();
    }
    echo "[500 OU AUTRES] TODO : handle exceptions";
    echo $e->getMessage();
}