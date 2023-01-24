<?php
const DB_HOST = 'localhost';
const DATABASE = 'bistro_food';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DSN = "mysql:host=" . DB_HOST . ';dbname=' . DATABASE;

const APP_DIR = ROOT_DIR . '/app';

const IMG_DIR = ROOT_DIR . '/assets/img/picture';
const SVG_DIR = ROOT_DIR . '/assets/img/svg';

enum Tables: string
{
    case Content = 'content';
    case Users = 'users';
    case Products = 'products';
    case Orders = 'orders';
    case OrderProducts = 'order_products';

}