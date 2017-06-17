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

<ul id="source" class="connectedSortable">

    <?php foreach ($items as $elem): ?>

        <li class="ui-state-default">
            <a class="item-image" data-id="<?php echo sc($elem['id']) ?>">
                <img src="/images/<?php sc($elem['image']) ?>" style="width: 69px; height: 64px;"
                     alt="<?php sc($elem['name']) ?>"></a>

            <div class="item-info"><?php sc($elem['name']) ?>
                <div class="price-value"><?php sc($elem['price']) ?>
                    <span style="font-family:u2000">₽</span>
                </div>
            </div>
        </li>

    <?php endforeach; ?>

</ul>

<ul id="destination" class="connectedSortable"></ul>

</body>
</html>