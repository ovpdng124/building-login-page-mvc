<?php include "view/logged_out/header.php";?>
<div class="row">
    <?php foreach ($list_products as $item): ?>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 my-5 border rounded">
            <div class="thumbnail">
                <img src="public/images/<?php echo $item->getImage(); ?>" alt="" height="80" width="80">
                <div class="caption">
                    <h3><?php echo $item->getName(); ?></h3>
                    <p style="color: red; font-weight: bold">
                        Price:
                        <?php echo number_format($item->getPrice())." $"; ?>
                    </p>
                    <p>
                    <form action="" method="post">
                        <div class="row">
                            <input type="hidden" name="code" value="<?php echo $item->getId();?>">
                            <button type="submit" name="action" value="add_cart" class="btn btn-primary form-control col-5 container" disabled>Add Cart</button>
                            <input type="number" placeholder="Quantity" value="1" name="quantity" class="container form-control col-5">
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>