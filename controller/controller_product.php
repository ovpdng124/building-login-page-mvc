<?php
require_once 'model/product.php';
require_once 'model/data.php';

$action = filter_input(INPUT_POST, 'action');
if (empty($action)) {
    $action = filter_input(INPUT_GET, 'action');
    if (empty($action)) {
        $action = 'index';
    }
}

switch ($action) {
    case 'list_products':
        if (AccountDB::check_login($userName, $passWord)) {
            $list_products = ProductDB::get_all_products();
            include 'view/product/list_products_logged.php';
        } else {
            $list_products = ProductDB::get_all_products();
            echo "<script>alert(\"Login session has expired!! Please login again!\")</script>";
            include 'view/product/list_products_logged_out.php';
        }
        break;

    case 'add_product_form':
        include 'view/product/add_product_form.php';
        break;

    case 'add_product':
        if (AccountDB::check_login($userName, $passWord)) {
            ProductDB::create_products($name, $price, $image);
            $list_products = ProductDB::get_all_products();
            include 'view/product/list_products_logged.php';
        } else {
            header('Location: index.php?controller=controller_login&action=login_form&cookie=time_out');
        }
        break;

    case 'add_cart':
        if (AccountDB::check_login($userName, $passWord)) {
            $cartDB = ProductDB::cartDB();
            $list_products = ProductDB::get_all_products();
            $result = false;
            foreach ($cartDB as $item) {
                if ($item['id'] == $id && $item['username'] == $userName) {
                    $result = true;
                    break;
                }
            }
            if ($result) {
                ProductDB::merge_cart($id, $quantity);
            } else {
                ProductDB::add_cart($id, $quantity, $userName);
            }
            include 'view/product/list_products_logged.php';
        } else {
            header('Location: index.php?controller=controller_login&action=login_form&cookie=time_out');
        }
        break;

    case 'shop_cart':
        $cartDB = ProductDB::cartDB();
        $count = 1;
        if (AccountDB::check_login($userName, $passWord)) {
            include 'view/product/shop_cart.php';
        }else {
            header('Location: index.php?controller=controller_login&action=login_form&cookie=time_out');
        }
        break;

    case 'destroy_all_cart':
        ProductDB::destroy_cart();
        $list_products = ProductDB::get_all_products();
        include 'view/product/list_products_logged.php';
        break;

    case 'delete_cart':
        ProductDB::delete_cart($id);
        $cartDB = ProductDB::cartDB();
        $count = 1;
        if (AccountDB::check_login($userName, $passWord)) {
            include 'view/product/shop_cart.php';
        }
        break;
}