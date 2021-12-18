<?php

class HistoryPageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/history');
        $I->seeInTitle('Game History');
        $I->seeElement('#logo');      
        $I->seeLink('Return to Game');
    }
}