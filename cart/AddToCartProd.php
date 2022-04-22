<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if(isset($_POST['addToCartProd'])) {
    $user_id = $_POST['user_id'];
    $dish_id = $_POST['dish_id'];
    $price = $_POST['price'];
    $product = $dataCart->findProductInCart($user_id, $dish_id);
    if($product == False) {
        $dataCart->addToCart($user_id, $dish_id, 1);
        header('Location: /index.php#menu ');
    } else {
        $newCount = $product->count + 1;
        $dataCart->updateProductInCart($user_id, $dish_id, $newCount);
        header('Location: /index.php#menu');
    }
}
