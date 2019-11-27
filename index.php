<?php
$lifetime = 30*24*3600;
session_set_cookie_params($lifetime, '/');
session_start();
include 'model/data.php';
include "model/account.php";
include 'model/product.php';
$controller = filter_input(INPUT_POST, 'controller');
if (empty($controller)) {
    $controller = filter_input(INPUT_GET, 'controller');
    if (empty($controller)) {
        $controller = 'index';
    }
}

switch ($controller) {
    case 'index':
        if (AccountDB::check_login($userName,$passWord)) {
            include 'view/homepage_logged.php';
        }else
            include 'view/homepage.php';
        break;
    case 'controller_login':
        include "controller/controller_login.php";
    case 'controller_product':
        include 'controller/controller_product.php';
}
