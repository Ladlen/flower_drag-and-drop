<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'functions.php';

$items = require 'product_list.php';

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

            <?php foreach ($items as $o => $elem): ?>

            <li class="ui-state-default product" data-id="<?php echo sc($elem['id']) ?>">
                <!--<img class="product_image" src="images/products/<?php /*echo sc($elem['image_preview']) */?>"
                     alt="<?php /*echo sc($elem['name']) */?>" title="<?php /*echo sc($elem['name']) */?>">-->
                <div class="product_image" title="<?php echo sc($elem['name']) ?>" style="background-image: url('images/products/<?php echo sc($elem['image_top']) ?>')"></div>

                <div class="item-info">
                    <label for="product_amount_<?php echo $o ?>" class="product_name"><?php echo sc($elem['name']) ?></label>
                    <div class="product_price_block">
                        <div class="product_price"><?php echo sc($elem['price']) ?></div>
                        <img class="ruble_sign" src="images/ruble_sign_2.png" alt="ruble">
                        <input id="product_amount_<?php echo $o ?>" class="product_amount" value="0" maxlength="3">
                    </div>
                </div>

                <div class="in-bouquet"></div>
            </li>

            <?php endforeach; ?>

        </ul>
        <ul class="destination connectedSortable"></ul>
    </div>

</div>

</body>
</html>