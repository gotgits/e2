<?php

namespace App;

class Products
{
    # Properties
    public $products = [];
    public $missing = [];

    # Methods
    public function __construct($dataSource)
    {
        $json = file_get_contents($dataSource);
        $this->products = json_decode($json, true);
    }
    // public function __construct($app)
    // #Invoke the parent constructor #error message can not redeclare App\Products::__construct()
    // {
    //     parent::__construct($app);
    //     $missing = array_search($sku, getById($this->missing, 'sku', 'id'));
    //     return $this->redirect('products/missing');
    // }

    public function getAll()
    {
        return $this->products;
    }

    public function getById(int $id)
    {
        return $this->products[$id] ?? null;
    }

    public function getBySku(string $sku)
    {
        $productId = array_search($sku, array_column($this->products, 'sku', 'id'));
        return $this->getById($productId);
    }
}