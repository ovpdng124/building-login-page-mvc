<?php
require_once 'model/data.php';
require_once 'model/accounts.php';
$action = filter_input(INPUT_POST, 'action');
if (empty($action)) {
    $action = filter_input(INPUT_GET, 'action');
    if (empty($action)) {
        $action = 'index';
    }
}

switch ($action) {
    case 'index':
        if (AccountDB::check_login($userName, $passWord)) {
            include 'view/homepage_logged.php';
        } else
            include 'view/homepage.php';
        break;
    case 'login_form':
        if (AccountDB::check_login($userName, $passWord)) {
            include 'view/logged_in.php';
        } else
            include 'view/login_form.php';
        break;
    case 'view_accounts':
        if (AccountDB::check_login($userName, $passWord)) {
            include 'view/logged_in.php';
        }
        break;
    case 'Login':
        if (AccountDB::check_user($userName, $passWord)) {
            $remember = filter_input(INPUT_POST, 'rememberMe');
            if ($remember == 'remembered') {
                $name = 'userName';
                $value = $userName;
                setcookie($name, $value, time() + 30 * 24 * 3600, '/');
                $name = 'passWord';
                $value = $passWord;
                setcookie($name, $value, time() + 30 * 24 * 3600, '/');
                echo "<script>alert(\"Login success! Welcome $userName\")</script>";
                include 'view/logged_in.php';
            } else {
                $name = 'userName';
                $value = $userName;
                setcookie($name, $value, time() + 900, '/');
                $name = 'passWord';
                $value = $passWord;
                setcookie($name, $value, time() + 900, '/');
                echo "<script>alert(\"Login success! Welcome $userName\")</script>";
                include 'view/logged_in.php';
            }
            break;
        } else include "view/login_form.php"; ?>
        <script>alert("Wrong username or password!!!")</script>
        <?php
        break;
    case 'logout':
        $name = 'userName';
        $value = '';
        setcookie($name, $value, time() - 30 * 24 * 3600, '/');
        $name = 'passWord';
        $value = '';
        setcookie($name, $value, time() - 30 * 24 * 3600, '/');
        include 'view/login_form.php';
        break;

    case 'signup_form':
        include 'view/signup_form.php';
        break;
    case 'Submit':
        if (!empty($userName) || $userName != NULL && !empty($passWord) || $passWord != NULL && !empty($email) || $email != NULL) {
            if ($passWord != $rePassword) {
                echo "<script>alert(\"Confirm password incorrect\")</script>";
                include "view/signup_form.php";
            } elseif (AccountDB::validate_user($userName, $email) == 'username') {
                include 'view/signup_form.php';
                echo "<script>alert(\"Username has existed!\")</script>";
            } elseif (AccountDB::validate_user($userName, $email) == 'email') {
                include 'view/signup_form.php';
                echo "<script>alert(\"Email address has existed!\")</script>";
            } else {
                if (AccountDB::register_user($userName, $passWord, $email)) {
                    echo "<script>alert(\"Congratulations! Register successfully\")</script>";
                    header('Location:/ph36/day10and11/cookies_login/index.php?controller=controller_login&action=login_form');
                } else {
                    echo "<script>alert(\"Some fields have empty!!!\")</script>";
                    include 'view/signup_form.php';
                }
            }
        } else {
            echo "<script>alert(\"Some fields have empty!!!\")</script>";
            include 'view/signup_form.php';
        }
        break;
}