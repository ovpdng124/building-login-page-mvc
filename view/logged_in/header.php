<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COOKIES and SESSION</title>
    <link rel="stylesheet" href="public/bootstrap4/css/bootstrap.min.css">
    <script src="public/bootstrap4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container ">
    <header class="bg-secondary p-2 rounded">
        <nav class="navbar">
            <div>
                <ul class="nav navbar-expand-sm">
                    <li class="nav-item active"><a href="?controller=controller_login&action=index" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item"><a href="?controller=controller_product&action=list_products" class="nav-link">Products</a>
                    </li>
                </ul>
            </div>
            <span style="font-weight: bold; color: white" class="text-center"><a style="text-decoration: none;" href="?controller=controller_login&action=view_accounts"><?php echo ucfirst($userName); ?></a></span>
            <div>
                <ul class="nav">
                    <li class="nav-item"><a href="?controller=controller_product&action=shop_cart" class="nav-link">Shop
                            Cart</a></li>
                    <li class="nav-item"><a href="?controller=controller_login&action=logout"
                                            class="nav-link">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>