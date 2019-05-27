<?php

namespace common\modules\chat\controllers;

use Yii;
use yii\console\Controller;
use Ratchet\Server\IoServer;
use common\modules\chat\components\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //require dirname(__DIR__) . '/vendor/autoload.php';

       // $port =
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ),
            Yii::$app->params['chat.port']
        );

        echo "Hello from Server!".PHP_EOL;
//8080
        $server->run();

    }
}
