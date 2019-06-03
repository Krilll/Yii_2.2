<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>

<div class="user-form">

    <?php $form = \yii\bootstrap\ActiveForm::begin(
            [
                    'options' => ['enctype' => 'multipart/form-data'],
                    'layout' => 'horizontal',
                    'fieldConfig' => ['horizontalCssClasses' =>
                    ['label' => 'col-sm-2',]],
            ]
    ); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->dropDownList(\common\models\User::STATUSES_NAMES) ?>

    <?= $form->field($model, 'avatar')
        ->fileInput(['accept' => 'image/*'])
        ->label('Avatar<br><br>'.Html::img($model->getThumbUploadUrl('avatar', \common\models\User::AVATAR_PREVIEW))) ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
