<?php

use Faker\Factory;

class HomePageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeInTitle('Game of Gnomes');
        $I->seeElement('#logo');
    }

    public function testValidationIsWorking(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('[test=submit-button]');
        $I->click('[test=submit-play-button]');

        $I->amOnPage('/');
        $faker = Factory::create();
        $player_name = $faker->words(3, true);
        $I->fillField('[test=name-input]', $player_name);
    }
}