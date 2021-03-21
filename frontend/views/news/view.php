<?php

use \yii\widgets\DetailView;
use \yii\helpers\Html;

/**
 * @var $model common\models\News
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['news/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-view">
	<h1><?=$model->title ?></h1>
	<p><?=$model->content?></p>
</div>
