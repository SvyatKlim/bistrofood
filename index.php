<?php
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

    $query = dbSelect(Tables::Content, 'content', "name = 'products' "  );
    debug_dump($query[0]['content']);
    die();
} catch (PDOException $exception) {
    showException($exception, 'Database');
} catch (Exception $exception) {
    showException($exception, 'Common');
}