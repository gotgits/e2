<?php

class HomePageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/');

        # Assert the existence of certain text on the page
        $I->see('Welcome');
    }
}