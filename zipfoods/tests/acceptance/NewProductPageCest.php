<?php

class NewProductPageCest
{
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/products/new');

        # Assert the correct title is set on the page
        $I->seeInTitle('Add A New Product');

        $I->fillField('name', 'required');

        # Assert the existence of text within a specific element on the page
        $name = 'New Product Name Test';
        $I->fillField('[test=new-product-name-input]', $name);
        $sku = 'product-sku-new-test';
        $I->fillField('[test=new-product-sku-input]', $sku);
        $description = 'product description new test';
        $I->fillField('[test=new-product-description-input]', $description);
        $price = '0.00';
        $I->fillField('[test=new-product-price-input]', $price);
        $available = 1;
        $I->fillField('[test=new-product-available-input]', $available);
        $weight = 1;
        $I->fillField('[test=new-product-weight-input]', $weight);

        $I->click('[test=new-product-submit-button]');
        $I->seeElement('.alert-success');
    }
}