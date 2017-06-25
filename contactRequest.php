<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$productItems = require 'product_list.php';

if (!empty($_POST['action']) && $_POST['action'] == 'contact_request') {
    $body = "Имя: $_POST[name]\n"
        . "Телефон: $_POST[phone]\n";

    if ($_POST['comment']) {
        $body .= "Комментарий: $_POST[comment]\n";
    }

    $body .= "\n";

    $body .= "Заказано:\n";
    foreach ($_POST['items'] as $item) {
        $body .= "$item[number] $item[name] - $item[price] руб. штука\n";
    }

    if (mail(BOUQUET_BOOKING_EMAIL, 'Оформлен заказ букета на имя ' . $_POST['name'], $body)) {
        die("1");
    }
}

die("0");
