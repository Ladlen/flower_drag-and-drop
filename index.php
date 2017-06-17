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

    <style>
        #source, #destination {
            border: 1px solid #eee;
            width: 142px;
            min-height: 20px;
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            margin-right: 10px;
        }

        #source li, #destination li {
            margin: 0 5px 5px 5px;
            padding: 5px;
            font-size: 1.2em;
            width: 120px;
        }
    </style>

    <script>
        $(function () {
            $("#source, #destination").sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        });
    </script>

</head>
<body>

<div id="products">

    <ul id="source" class="connectedSortable">

        <?php foreach ($items as $elem): ?>

            <li class="ui-state-default" data-id="<?php echo sc($elem['id']) ?>">
                <img class="product_image" src="images/<?php echo sc($elem['image']) ?>"
                     alt="<?php echo sc($elem['name']) ?>">

                <div class="item-info">
                    <div class="product_name"><?php echo sc($elem['name']) ?></div>
                    <div class="product_price"><?php echo sc($elem['price']) ?></div>
                    <img src="ruble_sign.png" style="width: 79px; height: 100px;">
                </div>
            </li>

        <?php endforeach; ?>

    </ul>

    <ul id="destination" class="connectedSortable" style="display:none"></ul>

</div>

</body>
</html>