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
        $( function() {
            $("#source, #destination").sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        } );
    </script>

</head>
<body>

<?php

$items = [
    ['image' => '1.png', 'name' => 'Цветок 1', 'price' => 10.5],
    ['image' => '2.png', 'name' => 'Цветок 2', 'price' => 5.38],
    ['image' => '3.png', 'name' => 'Цветок 3', 'price' => 1],
    ['image' => '4.png', 'name' => 'Цветок 4', 'price' => 4],
    ['image' => '5.png', 'name' => 'Цветок 5', 'price' => 8.06],
    ['image' => '6.png', 'name' => 'Цветок 6', 'price' => 7],
];
?>

<ul id="source" class="connectedSortable">

<?php foreach ($items as $elem): ?>

    <li class="ui-state-default">
        <div class="list-1"><div class="constructor-item" id="6016" rel="6016"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/b83/69_64_2/салал.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/salal.html" title="">Салал</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">60 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3566" rel="3566"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/a7a/69_64_2/big_7391.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/ruskus.html" title="">Рускус</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">60 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3561" rel="3561"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/a7f/69_64_2/rabilini.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/list-robelini.html" title="">Лист робелини</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">70 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3563" rel="3563"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/e63/69_64_2/free_15744454.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/list-paporotnika.html" title="">Лист папоротника</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">60 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3562" rel="3562"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/ed8/69_64_2/Aspidistra Leaf.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/list-aspedistry.html" title="">Лист Аспедистры</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">60 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3564" rel="3564"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/143/69_64_2/thm_LIMONIUM SAFARA DARK BLUE.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/limonium.html" title="">Лимониум</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">130 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3567" rel="3567"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/e49/69_64_2/2013-01-17_201723.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/korilius.html" title="">Карелиус</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">200 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3560" rel="3560"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/58e/69_64_2/inter_GYPSOPHILA MILLION STAR.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/gipsofila.html" title="">Гипсофила</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">120 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div><div class="constructor-item" id="3565" rel="3565"><a class="item-image" data-lightbox="image-1" title=""><img src="/upload/resize_cache/iblock/94b/69_64_2/2556871_w200_h200_577192.jpg" style="width: 69px; height: 64px;" alt="" title=""></a><div class="item-info"><a class="item-name" href="/catalog/dopolnenie+k+cvetam+zelen/bambuk.html" title="">Бамбук</a><a class="remove-item" href="javascript:void(0);" title="" style="display:none;"></a><div class="price-value rub">210 </div><div class="cnstr-ticker"><input class="cnstr-ticker" maxlength="3" value="1" rel="" type="text"><a class="cnstr-up" href="javascript:void(0)" title=""></a><a class="cnstr-down" href="javascript:void(0)" title=""></a></div><a class="in-bouquet" href="javascript:void(0);" title=""></a></div><div class="clear"></div></div></div>							<div class="cnstr-sep">
            <div class="sep-up"></div>
            <div class="sep-center"></div>
            <div class="sep-down"></div>
        </div>
        <div class="list-2"></div>
        <div class="clear"></div>
    </li>

<?php endforeach; ?>

</ul>

<ul id="destination" class="connectedSortable"></ul>

</body>
</html>