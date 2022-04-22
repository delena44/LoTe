<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
$products = $dataCart->getUserProducts($user->user_id);
$delivery = $dataCart->getOrders();
$products_count = 0;
$final_price = 0;

foreach ($products as $prod) {
    $final_price += $prod->count * $prod->price;
    $products_count += $prod->count;
}
include $_SERVER['DOCUMENT_ROOT'] . '/cart/cart.view.php';
