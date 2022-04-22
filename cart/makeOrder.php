<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if(isset($_POST['makeOrder'])) {
    $user_id = $user->user_id;
    $final_price = $_POST['final_price'];
    $date = (new DateTime())->format('Y-m-d');
    $status_id = 1;

    $order = $dataOrder->makeOrder($date, $user_id, $final_price, $status_id);

    $products = $dataOrder->getUserProducts($user_id);
    $dataOrder->deleteAllProductsFromCart($user_id);

    foreach ($products as $product) {
        $dataOrder->addOrderedProduct( $order,$product->dish_id, $product->count, $product->price );
    }

    header('Location: /cart/cart.php?id=' . $user_id);



}