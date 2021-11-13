<?php
namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    private $productsObj;
    # Create a construct method to set up a productsObj property that can be used across different methods
    public function __construct($app)
    {
        parent::__construct($app);
        $this->productsObj = new Products($this->app->path('database/products.json'));
    }
    public function index()
    {
        # Docs App methods
        // $productsObj = new Products($this->app->path('/database/products.json'));
        $products = $this->productsObj->getAll();
        return $this->app->view('products/index', ['products' => $products]);

        // dd($products);
        // var_dump($productsObj);
        # Docs Global helpers
        // dump($this->app->path('/database/products.json'));
        // dd($productsObj);
        // return 'This is the products index...';
    }
    
    public function show()
    {
        $sku = $this->app->param('sku');
        // $productsObj = new Products($this->app->path('/database/products.json'));
       
        $product = $this->productsObj->getBySku($sku);

        if (is_null($product)) {
            return $this->app->view('products/missing', ['missing'=>$missing]);
            # missing product – customized this page or a default  was errors/404
        }
        if (is_null($product)) {
            return $this->app->view('errors/404'); # customize this page or a default missing product page
        }

        return $this->app->view('products/show', [
            'product' => $product
        ]);
    }
}