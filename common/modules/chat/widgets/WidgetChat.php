<?php
namespace common\modules\chat\widgets;

use common\modules\chat\widgets\assets\ChatAsset;
use Yii;

class WidgetChat extends \yii\bootstrap\Widget
{
    public $port = 8080;

    public function  init()
    {
        ChatAsset::register($this->view);
        $this->view->registerJsVar('wsPort', $this->port);
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('chat');
    }
}
