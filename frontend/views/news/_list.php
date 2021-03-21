<?php

use \yii\helpers\Url;

/**
 * @var $model common\models\News
 */
?>

<div style="border: 1px solid gray; margin: 20px; padding: 20px" class="news-item">
    <h2 ><?=$model->title?></h2>
		<p><?=$model->shortContent() . '...'?></p>
		<p><a href="<?=Url::to(['/news/view/'])?>?id=<?=$model->id?>">Читать дальше</a></p>
</div>
