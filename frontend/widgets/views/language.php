<?php

use yii\helpers\Html;

?>

<?php foreach ($langs as $lang): ?>
    <?= Html::a($lang->name, '/' . $lang->url . Yii::$app->getRequest()->getLangUrl(), ['class' => "section-scroll"]) ?>
<?php endforeach; ?>
