<?php
namespace frontend\tests\unit\models;

use frontend\models\ContactForm;
use yii\mail\MessageInterface;

class HomeTest extends \Codeception\Test\Unit
{
    public function testHome()
    {
        $myBool = true;
        $myString = 'hello';
        $myNumber = 6;

        $this->assertTrue($myBool);
        $this->assertEquals('hello',$myString);
        $this->assertLessThan(10,$myNumber);

        $model = new ContactForm();

        $model->attributes = [
            'name' => 'Tester',
            'email' => 'tester@example.com',
            'subject' => 'very important letter subject',
            'body' => 'body of current message',
        ];

        $this->assertAttributeEquals('Tester', 'name', $model);
        $this->assertArrayHasKey('name', $model);

        expect($model->name)->equals('Tester');
        expect($model)->hasKey('name');
    }
}
