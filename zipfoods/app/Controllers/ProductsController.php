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
        
        if (is_null($sku)) {
            $this->app->redirect('/products');
        }
        $product = $this->productsObj->getBySku($sku);

        if (is_null($product)) {
            return $this->app->view('products/missing'); 
        }
        $reviewSaved = $this->app->old('reviewSaved');

        return $this->app->view('products/show', 
            ['product' => $product,
            'reviewSaved' => $reviewSaved       
        ]);
    }
    public function saveReview() { 
        // return 'Save review test...';
        # validation code should be at top, before retrieving data
        $this->app->validate([
            'sku' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);

        # If the above validation checks fail
        # The user is redirected back to where they came from (/product)
        # None of the code that follows will be executed

            # instead of using $_GET or $POST superglobals, 
            //dump($_POST['sku']);
            # instead use input() from the framework, allows for second parameter
            //dump($this->app->input('sku',''));
        $sku = $this->app->input('sku');
        $name = $this->app->input('name');
        $review = $this->app->input('review');
     # Todo: Persist review to the database...   
     # confirmation message, redirect data persisted or specifically flashed to the session or exist in the session for a single page request and then is deleted upon refresh
     return $this->app->redirect('/product?sku=' . $sku, ['reviewSaved' => true] );
    }
}