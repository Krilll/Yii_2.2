<?php

/* @var $this yii\web\View */

$this->title = 'Forum';
?>
<div class="site-index">

    <h2>Welcome!</h2>

    <?= common\modules\chat\widgets\WidgetChat::widget(['port' => Yii::$app->params['chat.port']]); ?>

</div>
