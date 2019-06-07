<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = \yii\bootstrap\ActiveForm::begin(
        [
            'options' => ['enctype' => 'multipart/form-data'],
            'layout' => 'horizontal',
            'fieldConfig' => ['horizontalCssClasses' =>
                ['label' => 'col-sm-2',]],
        ]
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'active')->dropDownList(\common\models\Project::STATUSES_NAMES) ?>


    <?= $form->field($model, \common\models\Project::RELATION_PROJECT_USERS)
    ->widget(MultipleInput::class, [
            // https://github.com/unclead/yii2-multiple-input/wiki/Usage
        'id' => 'project-users-widget',
        'max' => 10,
        'min' => 0,
        'addButtonPosition' => MultipleInput::POS_HEADER,
        'columns' => [
            [
                'name'  => 'user_id',
                'type'  => \unclead\multipleinput\MultipleInputColumn::TYPE_STATIC,
                'value' => function ($data) {
                    return $data ? Html::a($data->user->usernemr, ['user/view', 'id' => $data->user_id]): '';
                },
            ],
            [
                'name'  => 'project_id',
                'type'  => 'hiddenInput',
                'defaultValue' => $model->id,

            ],
            [
                'name'  => 'user_id',
                'type'  => 'dropDownList',
                'title' => 'User',
                'items' => \common\models\User::sortById_users(),
            ],
            [
                'name'  => 'role',
                'type'  => 'dropDownList',
                'title' => 'Role',
                'items' => \common\models\ProjectUser::ROLES_NAMES,
            ],

        ]
    ]);
    ?>


    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>
