<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$user_id = $user->user_id;
$dish_id = $_GET['dish_id'];

$dataCart->deleteProductFromCart($user_id, $dish_id);
header('Location: /cart/cart.php?id=' . $user_id);




