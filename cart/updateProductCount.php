<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$user_id = $_GET['user_id'];
$dish_id = $_GET['dish_id'];
$newCount = $_GET['count'];

$dataCart->updateProductInCart($user_id, $dish_id, $newCount);
header('Location: /cart/cart.php?id=' . $dish_id);





