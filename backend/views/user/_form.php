<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<div class="row">
		<div class="col-lg-5">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password_hash')->passwordInput() ?>

        <?= Html::checkboxList('roles', array_combine($model->roles, $model->roles), AuthItem::getArrayRoles()) ?>

			<div class="form-group">
          <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
			</div>

        <?php ActiveForm::end(); ?>
		</div>
	</div>
