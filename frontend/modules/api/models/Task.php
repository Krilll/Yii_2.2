<?php

namespace frontend\modules\api\models;

use Yii;


/**
 * This is the model class for table "task".
 */
class Task extends common\models\Task
{
    public function fields()
    {
        return [
            'id',
            'title',
            'description_short' =>  [['description'], 'max' => 50],
        ];
    }

    public function extraFields()
    {
        return ['profile'];
    }
}
