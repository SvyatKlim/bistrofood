<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

const ROOT_DIR = __DIR__;

if (!session_id()) {
    session_start();
}
//require_once APP_DIR . '/data.php';
require_once ROOT_DIR . '/configs/constants.php';
require_once ROOT_DIR . '/helpers/index.php';


try {
    require_once ROOT_DIR . '/configs/DB.php';
    require_once ROOT_DIR . '/app/db.php';
    require_once APP_DIR . '/index.php';

    if (!empty($_POST)) {

    }else{

        $mainFields = getContent('name IN ("navigation", "footer", "social")');
        require_once ROOT_DIR . '/configs/router.php';
    }

} catch (PDOException $exception) {
    showException($exception, 'Database');
} catch (Exception $exception) {
    showException($exception, 'Common');
}