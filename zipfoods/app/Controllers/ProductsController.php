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

    // public function missing()
    // {
    //     $missing = $this->productsObj->is_null($product);

    // }
    
    public function show()
    {
        $sku = $this->app->param('sku');
        # above is terse version for an absolute path instance, using the param method to retrieve route parameters/query string values:
        # this is the absolute path:
        // $productsObj = new Products($this->app->path('/database/products.json'))
        # which replaces a relative path:
        //  $productsObj = new Products('../database/products.json');
        # dump($$_GET['sku]);
        # dump($this->app->param('sku'));
       
        $product = $this->productsObj->getBySku($sku);

        if (is_null($product)) {
            return $this->app->view('products/missing'); # customize this page or a default missing product page
        }

        return $this->app->view('products/show', [
            'product' => $product
        ]);
    }
}