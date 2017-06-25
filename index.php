<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'functions.php';

$productItems = require 'product_list.php';

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
    <script type='text/javascript' src="js/jquery-mousewheel-3.1.13/jquery.mousewheel.min.js"></script>
    <script type='text/javascript' src='js/jquery.bpopup.min.js?ver=0.11.0'></script>

    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <script type="text/javascript" src="js/products.js"></script>

    <?php if (BACKGROUND): ?>
        <style>
            .destination {
                background: url(images/vase.jpg) no-repeat center center;
            }
        </style>
    <?php endif ?>

</head>
<body>

<div class="wrapper">

    <div class="products">
        <ul class="source connectedSortable">

            <?php foreach ($productItems as $elem): ?>

                <li class="ui-state-default product" data-id="<?php echo sc($elem['id']) ?>"
                    data-image_top="<?php echo sc($elem['image_top']) ?>" data-price="<?php echo sc($elem['price']) ?>"
                    data-name="<?php echo sc($elem['name']) ?>">
                    <div class="product_image" title="<?php echo sc($elem['name']) ?>"
                         style="background-image: url('images/products/<?php echo sc($elem['image_preview']) ?>')"></div>

                    <table class="item-info">
                        <tr>
                            <td><label for="product_amount_<?php echo sc($elem['id']) ?>"
                                       class="product_name"><?php echo sc($elem['name']) ?></label></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="product_price_block">
                                    <tr>
                                        <td>
                                            <div class="product_price"><?php echo sc($elem['price']) ?></div>
                                        </td>
                                        <td><img class="ruble_sign" src="images/ruble_sign_2.png" alt="ruble"></td>
                                        <td><input id="product_amount_<?php echo sc($elem['id']) ?>"
                                                   class="product_amount"
                                                   value="0" maxlength="3"></td>
                                        <td>
                                            <div class="in-bouquet"></div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </li>

            <?php endforeach; ?>

        </ul>
        <div class="destination connectedSortable"></div>

    </div>

    <div class="product_info">
        <span class="total_amount">0</span> руб.
        <button class="btn btn-default btn_order" disabled="disabled">Заказать</button>
    </div>

</div>

<script>
    (function($) {
        var e = '<div id="contact_popup">\
        <span class="b-close"><span>X</span></span>\
        <form id="custom_contact_form">\
            <div class="form-group">\
                <label for="custom_contact_name">Имя:</label>\
                <input type="email" class="form-control" id="custom_contact_name" name="contact_email" placeholder="Имя">\
                <small class="help-block" style="display:none">Пожалуйста введите имя</small>\
            </div>\
            <div class="form-group">\
                <label for="custom_contact_phone">Телефон:</label>\
                <input type="text" class="form-control" id="custom_contact_phone" name="contact_phone" placeholder="Телефон">\
                <small class="help-block" style="display:none">Пожалуйста введите телефон</small>\
            </div>\
            <div class="form-group">\
                <label for="custom_contact_message">Комментарий:</label>\
                    <textarea class="form-control" id="custom_contact_message" rows="4"></textarea>\
            </div>\
            <button type="submit" class="btn btn-primary" id="custom_contact_send" name="contact_send" value="contact_send">Отправить</button>\
        </form>\
    </div>';
        $('body').append(e);

        $("#custom_contact_form").submit(function(e) {
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
            if ($("#custom_contact_phone").val().length < 0) {
                $("#custom_contact_phone").parent().addClass("has-error");
                $("#custom_contact_phone + .help-block").show();
                hasErrors = true;
            }

            if (hasErrors) {
                return false;
            }

            var data = {
                action: 'contact_request',
                name: $("#custom_contact_name").val(),
                phone: $("#custom_contact_phone").val()
            };

            // 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
            $.post('contactRequest.php', data, function (response) {
                if (response) {
                    alert(response);
                    $('#contact_popup').bPopup().close();
                    $("#custom_contact_form").get(0).reset();
                } else {
                    alert('Ошибка: сервер вернул пустой результат. Попробуйте отослать данные позже.');
                }
            }).fail(function (response) {
                alert('Произошла внутренняя ошибка: ' + response.statusText + " : " + response.status);
            });

            return false;
        });

        /*$('[href="#show_contact_popup"]').click(function (e) {
            e.preventDefault();
            $('#contact_popup').bPopup({
                easing: 'easeOutBack',
                speed: 450,
                transition: 'slideDown'
            });
            return false;
        });*/

    })(jQuery);

</script>

</body>
</html>