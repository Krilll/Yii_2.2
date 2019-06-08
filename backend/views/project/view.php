<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">


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
            //'id',
            'title',
            'description:ntext',
            ['attribute' => 'active',
                //'filter' => \common\models\Project::STATUSES_NAMES
            ],
            //'active',
            /*'creator_id',
            'updater_id',
            'created_at',
            'updated_at',*/
        ],
    ]) ?>

    <?php  //{

        echo
            "<h2>" . 'Users in the project' . "</h2>" .
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'label' => 'User',
                        'format' => 'raw',

                        'value' => function(\common\models\ProjectUser $modelTwo) {

                            return Html::a(join($modelTwo->getUser()->select('username')->column()),
                                ['/user/view/', 'id' => $modelTwo->user_id]);
                        }



                    ],
                ],

            ]);
  //  }
    ?>


</div>
