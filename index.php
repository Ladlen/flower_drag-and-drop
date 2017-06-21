<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'functions.php';

$items = require 'product_list.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Продажа цветов</title>
    <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="css/products.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/products.js"></script>
</head>
<body>

<div class="wrapper">

    <div class="products">
        <ul class="source connectedSortable">

            <?php foreach ($items as $elem): ?>

            <li class="ui-state-default product" data-id="<?php echo sc($elem['id']) ?>">
                <!--<img class="product_image" src="images/<?php /*echo sc($elem['image_preview']) */?>"
                     alt="<?php /*echo sc($elem['name']) */?>" title="<?php /*echo sc($elem['name']) */?>">-->
                <div class="product_image" title="<?php echo sc($elem['name']) ?>" style="background-image: url('images/<?php echo sc($elem['image_top']) ?>')"></div>

                <div class="item-info">
                    <div class="product_name"><?php echo sc($elem['name']) ?></div>
                    <div class="product_price_block">
                        <div class="product_price"><?php echo sc($elem['price']) ?></div>
                        <img class="ruble_sign" src="ruble_sign.png" alt="ruble">
                    </div>
                </div>
            </li>

            <?php endforeach; ?>

        </ul>
        <ul class="destination connectedSortable"></ul>
    </div>

</div>

</body>
</html>