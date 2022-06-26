<?php

use yii\helpers\Html;

?>
<div class="">
    <p>Получатель: <?= $session['name'] ?></p>
    <p>E-mail: <a href="mailto:<?= $session['email'] ?>"><?= $session['email'] ?></a></p>
    <p>Телефон: <a href="tel:<?= $session['phone'] ?>"><?= $session['phone'] ?></a></p>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Фото</th>
            <th>Позиция</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $item) : ?>
            <tr>
                <td><?= Html::img("https://pandus.info/img/product/{$item['img']}", ['width' => 80] ) ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['price'] * $item['qty'] ?></td>
            </tr>
        <?php endforeach ?>

        <tr>
            <td colspan="4">Итого:</td>
            <td><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="4">На сумму:</td>
            <td><?= $session['cart.sum'] ?></td>
        </tr>

        </tbody>
    </table>

    <?php if (isset($session['comment'])) { ?>
        <p>Комментарий к запросу: <?= $session['comment'] ?></p>
    <?php } ?>

</div>
