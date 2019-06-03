<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email',
            //'access_token',
            ['label' => 'avatar',
                'value' => (
                    $model->getThumbUploadUrl('avatar', \common\models\User::AVATAR_PREVIEW)
                    ),
                'format' => ['image',['width'=>'100','height'=>'100']],
                ],
            //($model->getThumbUploadUrl('avatar', \common\models\User::AVATAR_PREVIEW))],
            'status',
            'created_at',
            'updated_at',
            //'verification_token',
            //'creator_id',
            //'updater_id',
        ],
    ]) ?>

</div>
