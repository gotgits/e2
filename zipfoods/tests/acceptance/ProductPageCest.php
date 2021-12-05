<?php

class ProductPageCest
{
    /**
     * Test that we can load the product page and see the expected content
     */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/product?sku=driscolls-strawberries');
        // $I->seeInCurrentUrl('');

        # Assert the correct title is set on the page
        $I->seeInTitle('Driscoll’s Strawberries');
        // $I->dontSeeLink('products/missing');
        $I->dontSeeInTitle('Product Not Found');

        # Assert the existence of certain text on the page
        $I->see('Driscoll’s Strawberries');

        # Assert the existence of a certain element on the page
        $I->seeElement('.product-thumb');

        // # Assert the existence of text within a specific element on the page
        // $I->see('$4.99', '.product-price');

        # Assert the existence of a custom selector or attribute in an element on the page
        $I->see('$4.99', '[test=product-price]');
    }
    # This test is independent from the previous test so repetition of the sku is necessary
    public function reviewAProductTest(AcceptanceTester $I)
    {
        $I->amOnPage('/product?sku=driscolls-strawberries');

        $name = 'Bob';
        $I->fillField('[test=reviewer-name-input]', $name);
        $I->fillField('name', 'required');

        $review = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pulvinar libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.';
        $I->fillField('[test=review-textarea]', $review);

        $I->click('[test=review-submit-button]');

        $I->seeElement('[test=review-confirmation]');

        # Confirm we see the review on the page
        $I->see($name, '[test=review-name]');
        $I->see($review, '[test=review-content]');
    }
}