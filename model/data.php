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
$check = '';