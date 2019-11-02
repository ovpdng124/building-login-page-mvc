<?php include "view/logged_out/header.php"; ?>
    <div class="breadcrumb">
        <form action="" method="post">
            <h1>Sign Up New Accounts</h1>
            <div class="row mx-1">
                <label class="form-check-label mx-1" for="">Account ID:</label>
                <input type="text" class="form-control mx-1 my-1" placeholder="Enter username" name="userName"
                       autofocus>
                <label class="form-check-label mx-1" for="">Email address:</label>
                <input type="email" class="form-control mx-1 my-1" placeholder="Ex: example@example.com" name="email">
                <label class="form-check-label mx-1" for="">Password:</label>
                <input type="password" class="form-control mx-1 my-1" placeholder="Enter password" name="passWord">
                <label class="form-check-label mx-1" for="">Confirm password:</label>
                <input type="password" class="form-control mx-1 my-1" placeholder="Re-Enter password" name="rePassWord">
                <input type="submit" class="btn btn-primary mx-1 my-1" name="action" value="Submit">
            </div>
        </form>
    </div>

<?php include 'view/footer.php'; ?>