<?php include 'view/logged_in/header.php' ?>
<div class="container">
    <form action="" method="post">
        <button class="m-2 btn btn-danger" type="submit" name="action" value="destroy_all_cart">Destroy all cart
        </button>
    </form>
    <table class="table table-striped rounded">
        <thead class='thead-light'>
        <tr style="text-align: center; font-size: 120%">
            <th>#</th>
            <th>id</th>
            <th>NAME</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>IMAGE</th>
            <th>TOTAL</th>
            <th>REMOVE</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total = 0;
        foreach ($cartDB as $key => $item) {
            if ($item['username'] == $userName) {
                ?>
                <tr style="font-weight: bold; color: #5a6268">
                    <td><?php echo $count++; ?></td>
                    <td style="text-align: center"><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td style="text-align: center"><?php echo $item['quantity']; ?></td>
                    <td style="text-align: right"><?php echo number_format($item['price']) . ' $'; ?></td>
                    <td><img src="public/images/<?php echo $item['image']; ?>" alt="" height="80" width="80"></td>
                    <td style="text-align: right"><?php echo number_format($item['total']) . ' $'; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <button class="float-right mr-4 btn btn-dark" type="submit" name="action" value="delete_cart">X
                            </button>
                        </form>
                    </td>
                </tr>
                <?php $total += $item['total'];
            }
        } ?>
        <tr>
            <th colspan="6" style="text-align: right; color: #1c7430; font-weight: bold; font-size: 150%"">TOTAL OF YOUR CART</th>
            <td colspan="2" style="text-align: center; color: #1c7430; font-weight: bold; font-size: 150%"><?php echo number_format($total).' $';?></td>
        </tr>
        </tbody>
    </table>
</div>