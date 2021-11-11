<?php
namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
        # Docs App methods
        $productsObj = new Products($this->app->path('/database/products.json'));
        $products = $productsObj->getAll();
        // dd($products);
        // var_dump($productsObj);
        # Docs Global helpers
        // dump($this->app->path('/database/products.json'));
        // dd($productsObj);
        return $this->app->view('products/index', ['products' => $products]);
                // return 'This is the products index...';      
    }
    
    public function show()
    {
    //    dump($_GET['sku']); super global, 
        # better to use framework method more utility with this param method
        $sku = $this->app->param('sku');

        $productsObj = new Products($this->app->path('/database/products.json'));

        $product = $productsObj->getBySku($sku);
        // dump($product);
        return $this->app->view('products/show', ['product' => $product]);

    }  
}
// http://e2zipfoods.metrognome.me/product?sku=driscolls-strawberries