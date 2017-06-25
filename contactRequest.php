<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$productItems = require 'product_list.php';

if (!empty($_POST['action']) && $_POST['action'] == 'contact_request') {
    $body = <<<BODY
Имя: $_POST[name]
Телефон: $_POST[phone]
BODY;
    if ($_POST['comment']) {
        $body .= "Комментарий: $_POST[comment]\n";
    }

    $body .= "Заказано:\n";
    foreach ($_POST['items'] as $item) {
        $body .= "$item[number] $item[name] - $item[price] руб. штука\n";
    }

    if (mail(BOUQUET_BOOKING_EMAIL, $body, 'Оформлен заказ букета на имя ' . $_POST['name'])) {
        die("1");
    }
}

die("0");
