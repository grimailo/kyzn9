<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="new-news">
    <h1>Новые новости</h1>
    <p>Привет <?= Html::encode($user->username) ?>,</p>
    <p>Перейдите по ссылке что бы прочитать новые новости</p>

    <p><?= Html::a(Html::encode(Yii::$app->urlManager->createAbsoluteUrl(['news/'])))?></p>
</div>