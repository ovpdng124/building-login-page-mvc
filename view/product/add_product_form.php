<?php include "view/logged_in/header.php"; ?>
<div class="container">
    <form action="" method="post">
        <label style="font-weight: bold; font-size: 120%;" for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Product Name" required>
        <label style="font-weight: bold; font-size: 120%;" for="">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Product Price" required>
        <label style="font-weight: bold; font-size: 120%;" for="">Image</label>
        <input type="url" class="form-control" name="image" placeholder="URL of Image" required>
        <button class="btn btn-primary" type="submit" name="action" value="add_product">Add New Product</button>
    </form>
</div>
