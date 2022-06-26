<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<p>В системе появился новый ответ.</p>

<p>Отправитель: <?= $name ?></p>
<p>Почта: <a href="mailto:<?= $email ?>"><?= $email ?></a></p>
<p>Телефон: <a href="tel:<?= $phone ?>"><?= $phone ?></a></p>
<p>Текст: <?= $body ?></p>

<p>Спасибо!</p>
