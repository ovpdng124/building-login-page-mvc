<?php include "view/logged_in/header.php"; ?>
<div class="container-fluid">
    <form action="" method="post">
        <button type="submit" class="form-control my-3 btn btn-primary" name="action" value="add_product_form">Add more
            products
        </button>
    </form>
</div>
<div class="row">
    <?php foreach ($list_products as $item): ?>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 my-2 border rounded">
            <div class="thumbnail">
                <div class="container">
                    <img class="container" src="<?php echo $item->getImage(); ?>" alt="" style="align-content: center"
                         height="300"
                         width="250">
                </div>
                <div class="container-fluid" style="height: 100px;">
                    <h3 class="text"><?php echo $item->getName(); ?></h3>
                </div>
                <div class="container" style="height: 20px;">
                    <p style="color: red; font-weight: bold; font-size: 120%;">
                        Price:
                        <?php echo number_format($item->getPrice()) . " $"; ?>
                    </p>
                </div>
                <div class="container">
                    <p>
                    <form action="" method="post">
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo $item->getId(); ?>">
                            <button type="submit" name="action" value="add_cart"
                                    class="btn btn-primary form-control col-5 container">Add Cart
                            </button>
                            <input type="number" placeholder="Quantity" value="1" name="quantity"
                                   class="container form-control col-5">
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>