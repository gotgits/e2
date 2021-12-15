<?php

use Faker\Factory;

class RegisterPageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/register');
        $I->see('Player Registration Log');
        $I->seeElement('#logo');
        $player['player_name'] = count($I->grabMultiple('#name'));
        $player['id'] = count($I->grabMultiple('#playerid'));
        $player['competitor'] = count($I->grabMultiple('#choice'));
        $I->seeLink('Return to Game');
    }
}