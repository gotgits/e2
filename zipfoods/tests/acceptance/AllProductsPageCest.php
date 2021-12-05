<?php

class AllProductsPageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/products');

        # Assert the correct title is set on the page
        $I->seeInTitle('All Products');

        $productCount = count($I->grabMultiple('.product-link'));
        $I->assertGreaterThanOrEqual(10, $productCount);
    }
}