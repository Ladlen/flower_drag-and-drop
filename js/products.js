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
        raiseFlower(itemId);
    });

    function spinOccured(id, value) {
        var diff = value - $(".destination img.product_" + id).length;

        if (diff > 0) {
            // add items
            for (var i = 0; i < diff; ++i) {
                raiseFlower(id);
            }
        } else if (diff < 0) {
            // remove items
            for (var i = 0; i < -diff; ++i) {
                removeFlower(id);
            }
        }   // else no changes
    }

    function raiseFlower(id) {
        var src = $(".product[data-id=" + id).data("image_top");
        src = '../images/products/' + encodeURIComponent(src)
        var s = "<img src='" + src + "' style='width:2px;opacity:0.1;left:" + x + "px;top:" + y + "px' class='product_" + id + "'>";
        $(".destination").append(s);
        $(".destination img:last-child").animate({
            width: "60px",
            opacity: 1
        }, 400);
        /*var fInterval = setInterval(function () {
         if (s.width < 60)
         //clearInterval(fInterval);
         }, 100);*/
    }

    function removeFlower(id) {

    }

    /*var animationTime = 3000;
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
     });*/
});
