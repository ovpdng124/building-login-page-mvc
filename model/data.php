<?php
$userName = filter_input(INPUT_POST, 'userName');
$passWord = filter_input(INPUT_POST, 'passWord');
$rePassword = filter_input(INPUT_POST,'rePassWord');
$email = filter_input(INPUT_POST, 'email');
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');
$image = filter_input(INPUT_POST, 'image');
$quantity = filter_input(INPUT_POST, 'quantity');
$products = array(
    array('code' => '001', 'name' => 'TV SAMSUNG LCD SCREEN 32 inch', 'price' => 15000000, 'image' => "img01.jpg"),
    array('code' => '002', 'name' => 'IPHONE 11 PRO MAX 512GB BLACK', 'price' => 33550000, 'image' => "img01.jpg"),
    array('code' => '003', 'name' => 'SAMSUNG GALAXY NOTE 10 PLUS ', 'price' =>  21990000, 'image' => "img01.jpg"),
    array('code' => '004', 'name' => 'LAPTOP DELL AILIEN CORE i9 3.7GHz', 'price' =>  25750000, 'image' => "img01.jpg"),
    array('code' => '005', 'name' => 'KEYBOARD COOLER MASTER X-GAMING PRO', 'price' =>  1200000, 'image' => "img01.jpg"),
    array('code' => '006', 'name' => 'MOUSEPAD COOLER MASTER X-GAMING PRO', 'price' => 800000, 'image' => "img01.jpg")
);
