<?php

use \yii\widgets\ListView;
use \yii\helpers\Html;
use \yii\helpers\Url;

/*
* @var $this yii\web\View
* @var $dataProvider yii\data\ActiveDataProvider
*/

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="news">

	<div class="jumbotron">
		<h1>Новости</h1>
	</div>
    <?php if (!Yii::$app->user->isGuest) { ?>
	<div class="body-content">

      <?= Html::beginForm(Url::to(['/news/']),'get'); ?>
			<?= Html::label('Количество новостей', 'pageSize')?>
      <?= Html::input('number', 'pageSize', $pageSize , ['options' =>['style' => ['width' => '70px']]]) ?>
      <?= Html::submitButton('Отфилтровать', ['class' => 'btn btn-primary']) ?>
      <?= Html::endForm(); ?>

      <?= ListView::widget([
          'dataProvider' => $dataProvider,
          'itemView' => '_list',
          'layout' => "\n{items}\n{pager}",
      ]);
      } else { ?>
				<h4 style="text-align: center;">Для просмотра новостей необходимо авторизоваться</h4>
      <?php } ?>
	</div>
</div>

