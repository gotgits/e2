<?php

class RoundPageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/round');
        $I->seeInTitle('Round Details');
        $I->seeElement('#logo');
        $I->see('Player turn:');
        $I->see('Opponent turn:');
        $I->see('Winner:');       
        $I->seeLink('Return to History');
    }
}