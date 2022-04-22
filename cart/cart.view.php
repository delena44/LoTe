<?php include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php'?>
<link href="css/cart.css" type="text/css" rel="stylesheet">

    <section class="cart">
        <?php if(count($products) == 0): ?>
            <p class="pusto">Корзина пуста...</p>

        <?php else: ?>
            <?php foreach($products as $prod): ?>
        <table>
            <tr>
                <th></th>
                <th>Пицца</th>
                <th>Цена</th>
                <th>Вес</th>
                <th>Количество</th>
                <th>Стоимость</th>
                <th></th>
                <th></th>
            </tr>
                    <tr>
                        <th ><img class="cart-img" src="/img/<?= $prod->foto?>" alt="" name="foto" id="loadImage"></th>
                        <th><?= $prod->name ?></th>
                        <th ><?= $prod->price ?>р.</th>
                        <th ><?= $prod->weight ?></th>
                        <th>
                            <div>
                                <input id="form1" min="1" name="quantity" class="quantity" value="<?= $prod->count ?>"
                                       type="number" data-product='<?= json_encode($prod) ?>'
                                       onchange = "let newCount = this.value; location.href = '/cart/updateProductCount.php?user_id=<?= $user->user_id ?>&dish_id=<?= $prod->dish_id ?>&count=' +newCount ;"/>
                            </div>
                        </th>
                        <th><?= $prod->count * $prod->price ?>р.</th>
                        <th >
                            <div>
                            <a class="btnback" href="/cart/deleteProductFromCart.php?dish_id=<?= $prod->dish_id ?>">Удалить</a>
                            </div>
                        </th>
                    </tr>
                </table>
            <?php endforeach; ?>
        <?php endif ?>
        <div class="block">
        <p class="value">Товары: <?= $products_count ?> шт.</p>
        <form action="/cart/makeOrder.php" method="post">
            <div class="d-flex justify-content-between mb-5">
                <h4 class="value-1">Итоговая цена: <?= $final_price ?> р.</h4>
                <input type="hidden" value="<?= $final_price ?>" class="hidden-cart-final-price" name="final_price">
            </div>
        <button  type="submit" name="makeOrder" class="btnback" >Оформить заказ</button>
        </div>
        </form>
    </section>