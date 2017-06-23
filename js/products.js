jQuery(function ($) {
    var maxItems = 500;

    var spinner = $(".product_amount").spinner({
        min: 0, max: maxItems,
        stop: function (event, ui) {
            //console.log("CURR: " + $(this).val() + "; NEXT: " + ui.value);
            spinOccured($(this).parents(".product").data("id"), $(this).val());
        },
        change: function (event, ui) {
            //console.log("CURR: " + $(this).val() + "; NEXT: " + ui.value);
            var value = parseInt($(this).val());
            if (value > maxItems) {
                $(this).val(maxItems);
            } else if (value < 0) {
                $(this).val(0);
            } else if (value != $(this).val()) {
                $(this).val(value);
            }
            spinOccured($(this).parents(".product").data("id"), $(this).val());
        }
    });

    $(".in-bouquet").click(function () {
        var elem = $(this).parents(".product");
        var itemId = elem.data("id");
        var spinnerSelector = "#product_amount_" + itemId;
        $(spinnerSelector).spinner("stepUp", 1);
        spinOccured(itemId, $(spinnerSelector).val());
    });

    /**
     * @param id    - идентификатор цветка
     * @param amount - количеcтво добавляемых цветков
     */
    function spinOccured(id, amount) {
        var diff = amount - $(".destination img.product_" + id).length;

        if (diff > 0) {
            // add items
            for (var i = 0; i < diff; ++i) {
                updateBoquet();
            }
        } else if (diff < 0) {
            // remove items
            for (var i = 0; i < -diff; ++i) {
                //removeFlower(id);
                updateBoquet();
            }
        }   // else no changes
    }

    function updateBoquet() {
        var totalAmount = 0;
        var flowers = [];
        $(".source .product").each(function (index) {
            var info = {};
            info.image_top = $(this).data("image_top");
            info.amount = parseInt($(this).find(".product_amount").val());
            totalAmount += info.amount;
            flowers[$(this).data("id")] = info;
        });

        var sel = $(".destination .product_item");
        if (sel.length > 0) {
            sel.fadeOut(200, function () {
                $(this).remove();
                console.log('POS-1');
                if ($(".destination .product_item").length < 1) {
                    drawBoquet(flowers, totalAmount);
                }
            });
        } else {
            console.log('POS-2');
            drawBoquet(flowers, totalAmount);
        }
    }

    function drawBoquet(flowers, totalAmount) {
        console.log("totalAmount: " + totalAmount);
        var sizes = calculateBouquetSizes(totalAmount);
        for (var fl in flowers) {
            for (var i = 0; i < flowers[fl].amount; ++i) {
                var pos = getRandomPosition(sizes.bouquetDiameter / 2);
                //raiseFlower(pos.x, pos.y, 50, flowers[fl].image_top)
                raiseFlower(pos.x, pos.y, 50, fl)
            }
        }
    }

    function getRandomPosition(radius) {
        var pt_angle = Math.random() * 2 * Math.PI;
        var pt_radius_sq = Math.random() * radius * radius;
        var pt_x = Math.sqrt(pt_radius_sq) * Math.cos(pt_angle);
        var pt_y = Math.sqrt(pt_radius_sq) * Math.sin(pt_angle);

        return {x: pt_x, y: pt_y};
    }

    /**
     * Упорядочить цветки в букет.
     * @param newId     - id цветков если нужны плейсхолдеры для новых цветков
     * @param newAmount - количество новых цветков если есть
     */
    /*function orderFlowers(newId, newAmount) {
     var i = 0;
     var prodAmounts = {};
     for (; ;) {
     var productList = $(".destination .product_" + i);
     if (!productList.length) {
     break;
     }
     prodAmounts[i] = productList.length;
     prodAmounts.sort();
     }
     }*/

    function calculateBouquetSizes(newAmount) {
        var totalFlowerCount = $(".destination .product_item").length + newAmount;
        var maxBouqetDiameter = Math.min($(".destination").width(), $(".destination").height()) * 0.8;

        var sizes = {};

        sizes.bouquetDiameter = maxBouqetDiameter / Math.sqrt(totalFlowerCount);
        sizes.maxFlowerDiameter = sizes.bouquetDiameter * 0.7;
        sizes.minFlowerDiameter = sizes.maxFlowerDiameter * 0.6;

        return sizes;
    }

    function raiseFlower(x, y, width, id) {
        console.log("X: " + x + "; Y: " + y + "; Width: " + width + "; id: " + id);
        x = x + $(".destination").width() / 2;
        y = y + $(".destination").height() / 2;
        var src = $(".product[data-id='" + id + "'").data("image_top");
        src = 'images/products/' + encodeURIComponent(src);
        var s = "<img src='" + src + "' style='width:2px;opacity:0.1;left:" + x + "px;top:" + y + "px' class='product_item product_" + id + "'>";
        $(".destination").append(s);
        $(".destination img:last-child").animate({
            width: width + "px",
            opacity: 1
        }, 400);
        /*var fInterval = setInterval(function () {
         if (s.width < 60)
         //clearInterval(fInterval);
         }, 100);*/
    }
});
