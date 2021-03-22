<?php
use \yii\helpers\Url;

/**
 * @var $model
 */
?>
<div class="news-popup">
    <div class="news-title">Заголовок : <?= $model->title?></div>
	<a href="<?=Url::to(['/news/view?id=']) . $model->id?>">Читать статью</a>
</div>
