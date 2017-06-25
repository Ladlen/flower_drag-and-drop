jQuery(function ($) {
    var maxItems = 500;

    var spinner = $(".product_amount").spinner({
        min: 0, max: maxItems,
        stop: function (event, ui) {
            spinOccured($(this).parents(".product").data("id"), $(this).val());
        },
        change: function (event, ui) {
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

    $(".btn_order").click(function () {
        if (parseFloat($(".total_amount").html()) > 0) {
            $('#contact_popup').bPopup({
                easing: 'easeOutBack',
                speed: 450,
                transition: 'slideDown'
            });
        }
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
        var totalPrice = 0;
        var totalAmount = 0;
        var flowers = [];
        $(".source .product").each(function (index) {
            var info = {};
            info.image_top = $(this).data("image_top");
            info.amount = parseInt($(this).find(".product_amount").val());
            totalAmount += info.amount;
            flowers[$(this).data("id")] = info;
            totalPrice += info.amount * parseFloat($(this).data("price"));
        });

        var sel = $(".destination .product_item");
        if (sel.length > 0) {
            sel.fadeOut(200, function () {
                $(this).remove();
                if ($(".destination .product_item").length < 1) {
                    drawBoquet(flowers, totalAmount);
                }
            });
        } else {
            drawBoquet(flowers, totalAmount);
        }

        $(".total_amount").html(totalPrice.toFixed(2));

        $(".btn_order").prop("disabled", !totalPrice);

        /*if (totalPrice) {
         $('#contact_popup').bPopup({
         easing: 'easeOutBack',
         speed: 450,
         transition: 'slideDown'
         });
         }*/
    }

    function shuffle(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    }

    function getTotalFlowersCount() {
        var totalFlowerCount = 0;
        $(".products .product_amount").each(function () {
            totalFlowerCount += parseInt($(this).val());
        });
        console.log("totalFlowerCount: " + totalFlowerCount);
        return totalFlowerCount;
    }

    function drawBoquet(flowers, totalAmount) {
        var elements = [];
        var flowersAmount = getTotalFlowersCount();
        var sizes = calculateBouquetSizes(flowersAmount);
        for (var fl in flowers) {
            for (var i = 0; i < flowers[fl].amount; ++i) {
                var width = Math.floor((Math.random() * (sizes.maxFlowerDiameter - sizes.minFlowerDiameter)) + sizes.minFlowerDiameter);
                var pos = getRandomPosition(sizes.bouquetDiameter / 2, width, flowersAmount);
                elements.push({
                    x: pos.x,
                    y: pos.y,
                    width: width,
                    id: fl,
                });
                /*raiseFlower(pos.x, pos.y,
                 Math.floor((Math.random() * (sizes.maxFlowerDiameter - sizes.minFlowerDiameter)) + sizes.minFlowerDiameter), fl);*/
            }
        }

        elements = shuffle(elements);
        for (var elem in elements) {
            raiseFlower(elements[elem].x, elements[elem].y, elements[elem].width, elements[elem].id);
        }
    }

    function getRandomPosition(radius, width, flowersAmount) {
        /*var pt_angle = Math.random() * 2 * Math.PI;
         var pt_radius_sq = Math.random() * radius * radius;
         var pt_x = Math.sqrt(pt_radius_sq) * Math.cos(pt_angle);
         var pt_y = Math.sqrt(pt_radius_sq) * Math.sin(pt_angle);*/

        /*var halfX = $(".destination").width() / 2;
        var halfY = $(".destination").height() / 2;

        var halfObject = width / 2;

        console.log("width: " + width + "; flowersAmount: " + flowersAmount + "; halfX: " + halfX + "; halfY: " + halfY);

        if (flowersAmount > 30) {
            flowersAmount = 30;
        }

        var offsetX = (halfX - halfObject) * (flowersAmount / 30 * Math.random());
        var offsetY = (halfY - halfObject) * (flowersAmount / 30 * Math.random());

        console.log("offsetX: " + offsetX + "; offsetY: " + offsetY);

        if (Math.random() > .5) {
            pt_x = halfX - halfObject + offsetX;
        } else {
            pt_x = halfX - halfObject - offsetX;
        }
        if (Math.random() > .5) {
            pt_y = halfY - halfObject + offsetY;
        } else {
            pt_y = halfY - halfObject - offsetY;
        }*/

        //var pt_x = ($(".destination").width() / 2) + Math.random() * flowersAmount * width;
        //var pt_y = ($(".destination").height() / 2) + Math.random() * flowersAmount * width;

        /*if (flowersAmount > 50) {
            flowersAmount = 50;
        }*/

        var pt_angle = Math.random() * 2 * Math.PI;
        var pt_radius_sq = Math.random() * width / (1 / flowersAmount);
        //var pt_x = Math.sqrt(pt_radius_sq) * Math.cos(pt_angle);
        //var pt_y = Math.sqrt(pt_radius_sq) * Math.sin(pt_angle);
        var pt_x = Math.sqrt(pt_radius_sq) * Math.cos(pt_angle);
        var pt_y = Math.sqrt(pt_radius_sq) * Math.sin(pt_angle);

        /*if (pt_x > $(".destination").width() - width) {
            pt_x = $(".destination").width() - width;
        } else if (pt_x < 0) {
            pt_x = 0;
        }
        if (pt_y > $(".destination").height() - width) {
            pt_y = $(".destination").height() - width;
        } else if (pt_y < 0) {
            pt_y = 0;
        }*/

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
        //var totalFlowerCount = $(".destination .product_item").length + newAmount;
        var totalFlowerCount = getTotalFlowersCount();
        var maxBouqetDiameter = Math.min($(".destination").width(), $(".destination").height()) * 0.9;

        var sizes = {};

        //sizes.bouquetDiameter = maxBouqetDiameter / Math.sqrt(totalFlowerCount);
        sizes.bouquetDiameter = maxBouqetDiameter;
        sizes.maxFlowerDiameter = sizes.bouquetDiameter * 0.7;
        sizes.minFlowerDiameter = sizes.maxFlowerDiameter * 0.8;

        return sizes;
    }

    function raiseFlower(x, y, width, id) {
        console.log("X: " + x + "; Y: " + y + "; Width: " + width + "; id: " + id);

        var halfWidth = width / 2;

        x = x + $(".destination").width() / 2;
        y = y + $(".destination").height() / 2;

        if (x > $(".destination").width() - halfWidth) {
            x = $(".destination").width() - halfWidth;
        } else if (x < halfWidth) {
            x = halfWidth;
        }
        if (y > $(".destination").height() - halfWidth) {
            y = $(".destination").height() - halfWidth;
        } else if (y < halfWidth) {
            y = halfWidth;
        }

        var src = $(".product[data-id='" + id + "'").data("image_top");
        src = 'images/products/' + encodeURIComponent(src);
        var s = "<img src='" + src + "' style='width:2px;opacity:0.1;left:" + x + "px;top:" + y + "px' class='product_item product_" + id + "'>";
        $(".destination").append(s);
        $(".destination img:last-child").animate({
            width: width + "px",
            left: (x - halfWidth) + "px",
            top: (y - halfWidth) + "px",
            opacity: 1
        }, 400);
        /*var fInterval = setInterval(function () {
         if (s.width < 60)
         //clearInterval(fInterval);
         }, 100);*/
    }

    $("#custom_contact_close").click(function () {
        $('#succes_popup').bPopup().close();
    });

    $("#custom_contact_form").submit(function (e) {
        e.preventDefault();

        $("#custom_contact_form .form-group").removeClass("has-error");
        $("#custom_contact_form .help-block").hide();

        var hasErrors = false;

        var name = $.trim($("#custom_contact_name").val());
        $("#custom_contact_name").val(name);
        var phone = $.trim($("#custom_contact_phone").val());
        $("#custom_contact_phone").val(phone);

        if ($("#custom_contact_name").val().length == 0) {
            $("#custom_contact_name").parent().addClass("has-error");
            $("#custom_contact_name + .help-block").show();
            hasErrors = true;
        }
        if ($("#custom_contact_phone").val().length == 0) {
            $("#custom_contact_phone").parent().addClass("has-error");
            $("#custom_contact_phone + .help-block").show();
            hasErrors = true;
        }

        if (hasErrors) {
            return false;
        }

        var flowers = [];

        $(".source .product").each(function () {
            var newItem = {};
            if (newItem.number = parseInt($(this).find('.product_amount').val())) {
                newItem.name = $(this).data('name');
                newItem.price = $(this).data('price');
                flowers.push(newItem);
            }
        });

        var data = {
            action: 'contact_request',
            name: $("#custom_contact_name").val(),
            phone: $("#custom_contact_phone").val(),
            comment: $("#custom_contact_message").val(),
            items: flowers
        };

        $.post('contactRequest.php', data, function (response) {
            if (response) {
                if (response == "0") {
                    alert("Ошибка отправки заказа: попробуйте повторить попытку позже.");
                } else {
                    $('#contact_popup').bPopup().close();
                    $('#succes_popup').bPopup({
                        easing: 'easeOutBack',
                        speed: 450,
                        transition: 'slideDown'
                    });
                    $("#custom_contact_form").get(0).reset();
                }
            } else {
                alert('Ошибка: сервер вернул пустой результат. Попробуйте отослать данные позже.');
            }
        }).fail(function (response) {
            alert('Произошла внутренняя ошибка: ' + response.statusText + " : " + response.status);
        });

        return false;
    });

    function whetherFormProperlyFilled() {
        var name = $("#custom_contact_name").val();
        name = $.trim(name);
        var phone = $("#custom_contact_phone").val();
        phone = $.trim(phone);
        $("#custom_contact_send").prop("disabled", !(name.length && phone.length));
    }

    $("#custom_contact_name").change(function () {
        whetherFormProperlyFilled();
    });
    $("#custom_contact_phone").change(function () {
        whetherFormProperlyFilled();
    });

    $("#custom_contact_name").keyup(function () {
        whetherFormProperlyFilled();
    });
    $("#custom_contact_phone").keyup(function () {
        whetherFormProperlyFilled();
    });

    whetherFormProperlyFilled();

    updateBoquet();

});
