<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'functions.php';

$productItems = require 'product_list.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Продажа цветов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="css/products.css">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script src="js/jquery-mousewheel-3.1.13/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="js/products.js"></script>

</head>
<body>

<div class="wrapper">

    <div class="products">
        <ul class="source connectedSortable">

            <?php foreach ($productItems as $elem): ?>

                <li class="ui-state-default product" data-id="<?php echo sc($elem['id']) ?>"
                    data-image_top="<?php echo sc($elem['image_top']) ?>" data-price="<?php echo sc($elem['price']) ?>"
                    data-name="<?php echo sc($elem['name']) ?>">
                    <div class="product_image" title="<?php echo sc($elem['name']) ?>"
                         style="background-image: url('images/products/<?php echo sc($elem['image_preview']) ?>')"></div>

                    <table class="item-info">
                        <tr>
                            <td><label for="product_amount_<?php echo sc($elem['id']) ?>"
                                       class="product_name"><?php echo sc($elem['name']) ?></label></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="product_price_block">
                                    <tr>
                                        <td>
                                            <div class="product_price"><?php echo sc($elem['price']) ?></div>
                                        </td>
                                        <td><img class="ruble_sign" src="images/ruble_sign_2.png" alt="ruble"></td>
                                        <td><input id="product_amount_<?php echo sc($elem['id']) ?>" class="product_amount"
                                                   value="0"
                                                   maxlength="3"></td>
                                        <td>
                                            <div class="in-bouquet"></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </li>

            <?php endforeach; ?>

        </ul>
        <div class="destination connectedSortable"></div>
    </div>

</div>

</body>
</html>