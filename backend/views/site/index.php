<?php

/* @var $this yii\web\View */

$this->title = 'Админка';
?>
<div class="site-index">
	<div class="jumbotron">
		<h1>Congratulations!</h1>
		<p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['/user/'])?>">Упраление пользователями</a></p>
		<p><a class="btn btn-default" href="<?php echo \yii\helpers\Url::to(['/news/'])?>">Новости</a></p>
	</div>
</div>
