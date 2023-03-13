<?php
# dev! | will be replaced by Dotenv | already done DotEnv.php
const DSN = 'mysql:host=localhost;dbname=blog_mvc;charset=utf8';
const USERNAME = 'root';
const PASSWORD = 'root';

define('ENV_PATH', dirname(__DIR__) .
    DIRECTORY_SEPARATOR . 'src' .
    DIRECTORY_SEPARATOR . 'Framework' .
    DIRECTORY_SEPARATOR . 'Database'
);
define('TEMPLATE_DIRECTORY', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR);
define('UPLOAD_IMAGE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'upload');
define('ENTITY_DIRECTORY', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Entity');






