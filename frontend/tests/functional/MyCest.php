<?php
namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class MyCest
{
    public function _before(FunctionalTester $I){
    }

    /**
     * @dataProvider pageProvider
     */
    public function tryToTest(FunctionalTester $I, \Codeception\Example $data)
    {
        $I->amOnPage([$data['url']]);
        $I->see($data['h1'], 'li.active>a');
    }

    protected function pageProvider()
    {
        return [
            ['url'=>"site/about", 'h1'=>"About"],
            ['url'=>"site/contact", 'h1'=>"Contact"],
            ['url'=>"site/signup", 'h1'=>"Signup"],
            ['url'=>"site/index", 'h1'=>"Home"],
            ['url'=>"site/login", 'h1'=>"Login"],
        ];
    }
}
