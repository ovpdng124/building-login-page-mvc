<?php include "view/logged_out/header.php";
$timeout = filter_input(INPUT_GET, 'cookie');
if($timeout == 'time_out'){
    echo "<script>alert(\"Login session has expired!! Please login again!\")</script>";
}
?>
    <div class="breadcrumb">
        <form action="" method="post">
            <h1>Login to the system</h1>
            <div class="row mx-1">
                <input type="text" class="form-control mx-1 my-1" placeholder="Enter username" name="userName"
                       autofocus>
                <input type="password" class="form-control mx-1 my-1" placeholder="Enter password" name="passWord">
                <input type="submit" class="btn btn-primary mx-1 my-1" name="action" value="Login">
                <div class="form-check mx-2 my-3">
                    <input type="checkbox" name="rememberMe" class="form-check-input" value="remembered">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
            </div>
        </form>
    </div>
<?php
include 'view/footer.php'; ?>