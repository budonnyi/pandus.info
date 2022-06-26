<?php
?>

<div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Товар</th>
            <th>Имя</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item) { ?>
            <tr>
                <th><?= $item->product->name_ru ?></th>
                <th><?= $item->name ?></th>
                <th><?= $item->price ?></th>
                <th><?= $item->qty_item ?></th>
                <th><?= $item->sum_item ?></th>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
