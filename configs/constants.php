<?php
const DB_HOST = 'localhost';
const DATABASE = 'bistro_food';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DSN = "mysql:host=" . DB_HOST . ';dbname=' . DATABASE;

const APP_DIR = ROOT_DIR . '/app';

enum Tables: string
{
    case Content = 'content';
    case Users = 'users';
    case Products = 'products';
    case Orders = 'orders';
    case OrderProducts = 'order_products';

}

const VIEW_DIR = ROOT_DIR . '/views';
const PAGE_DIR = VIEW_DIR . '/pages';
const ADMIN_PAGE_DIR = PAGE_DIR . '/admin';
const PARTS_DIR = VIEW_DIR . '/parts';
const ADMIN_PARTS_DIR = ADMIN_PAGE_DIR . '/parts';

define("DOMAIN", $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

const ASSETS_URI = DOMAIN . '/assets'; // localhost/assets/...
const ASSETS_DIR = ROOT_DIR . '/assets';  // /user/user/...
const IMAGES_URI = ASSETS_URI . '/img/picture/'; // localhost/assets/...
const IMAGES_DIR = ASSETS_DIR . '/img/picture/';  // /user/user/...
const SVG_URI = ASSETS_URI . '/img/svg/'; // localhost/assets/...
const SVG_DIR = ASSETS_DIR . '/img/svg/';  // /user/user/...

const IMAGE_BREAKPOINTS = [
    "mobile" => "300px",
    "tablet" => "480px",
    "laptop" => "840px",
    "desktop" => "1441px",
    "widescreen" => "1921px",
];

