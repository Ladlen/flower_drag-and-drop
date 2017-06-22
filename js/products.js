jQuery(function ($) {
    var spinner = $(".product_amount").spinner({min: 0, max: 500});

    $(".in-bouquet").click(function () {
        var elem = $(this).parents(".product");
        var itemId = elem.data("id");
        var itemImageTop = elem.data("image_top");
        var spinnerSelector = "#product_amount_" + itemId;
//        $(spinnerSelector) +1
        raiseFlower(150, 200, '../images/products/' + encodeURIComponent(itemImageTop));
    });

    function raiseFlower(x, y, src) {
        var s = "<img src='" + src + "' style='width:2px;opacity:0.1;left:" + x + "px;top:" + y + "px'>";
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
