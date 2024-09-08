<?php

    // enforce strict data types
    declare(strict_types=1);

    // multi-dimensional array that holds a pokemon and it's price and stock info
    $cards = [
        'Bulbasaur' => ['price' => 3, 'stock' => 12],
        'Charmander' => ['price' => 2,'stock' => 26],
        'Squirtle' => ['price' => 4,'stock' => 88]
    ];

    // a variable to hold the tax rate in percentage
    $tax_rate = 8;

    // determine the message to display based on the inputted stock
    function determine_reorder_message(int $stock): string {
        return ($stock < 20) ? 'Yes' : 'No';
    }

    // total value of in stock items based on the current quantity and price
    function get_total_value(float $price, int $quantity): float {
        return $price * $quantity;
    }

    // returns the amount of tax owed on the current in stock items
    function get_tax_due(float $price, int $quantity, int $tax = 0): float {
        return ($price * $quantity) * ($tax / 100);
    }

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Randall's Example - Week 3</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="css/my-example-styles.css" rel="stylesheet">
    </head>

    <?php include "navbar.php";?>

    <body>

        <div class="">
            <!-- <h1 class="text-center">Randall's Pokemon Shop</h1> -->
            <?php include "carousel.php" ?>
        </div>

        <div class="content-container text-center">
            <h1 class="content-head">Stock Page</h1>
            <div class="content-contents">
                <h4>Pokemon Cards</h4>
                <table class="table">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Re-Order</th>
                        <th>Total Value</th>
                        <th>Tax Due</th>
                    </tr>
                    <?php foreach($cards as $product_name => $attribute) { ?>
                        <tr>
                            <td><?= $product_name ?></td>
                            <td>$<?= $attribute['price'] ?></td>
                            <td><?= $attribute['stock'] ?></td>
                            <td><?= determine_reorder_message($attribute['stock']) ?></td>
                            <td>$<?= get_total_value($attribute['price'], $attribute['stock']) ?></td>
                            <td>$<?= get_tax_due($attribute['price'], $attribute['stock'], $tax_rate) ?></td>
                        </tr>
                    <?php } ?>
                </table>
                
            </div>
        </div>

    </body>

    <?php include "footer.php" ?>

</html>