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
    <!--<script type="text/javascript" src="js/products.old.js"></script>-->

    <script>
        $(function () {
            var animationTime = 3000;
            $(".product").click(function () {
                $(".source").animate({
                    width: "6em"
                }, animationTime, function () {
                    // Animation complete.
                    $('.product').off('click');
                    $(".source, .destination").sortable({
                        connectWith: ".connectedSortable"
                    }).disableSelection();
                });
                $(".destination").show().animate({
                    width: "17em"
                }, animationTime);
                $(".source li").animate({
                    "font-size": "50%"
                }, animationTime);
                $(".item-info").fadeOut(animationTime);
            });
        });
    </script>

</head>
<body>

<div id="order_wrapper">

    <div class="products">

        <ul class="source connectedSortable">

            <?php foreach ($items as $elem): ?>

                <li class="ui-state-default product" data-id="<?php echo sc($elem['id']) ?>"
                    title="Нажмите чтобы выбрать">
                    <img class="product_image" src="images/<?php echo sc($elem['image']) ?>"
                         alt="<?php echo sc($elem['name']) ?>" title="<?php echo sc($elem['name']) ?>">

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

        <ul class="destination connectedSortable" style="display:none"></ul>
    </div>

<!--<div class="order" style="display:none">
    <ul class="destination connectedSortable"></ul>
</div>-->

</div>

</body>
</html>