<?php
namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
        # Docs App methods

        $products = $this->app->db()->all('products'); # parameter for 

        return $this->app->view('products/index', ['products' => $products]);
    }

    public function show()
    {    # a terse version for an absolute path instance, 
         # using the param method to retrieve route parameters/query string values:
        $sku = $this->app->param('sku');
        
        if (is_null($sku)) {
            $this->app->redirect('/products');
        }
         # Signature //$app->db()->findByColumn(string $table, string $column, string $operator, mixed $value)
         $productQuery = $this->app->db()->findByColumn('products', 'sku', '=', $sku);
         
        if (empty($productQuery)) {
            return $this->app->view('products/missing');
        } else {
            $product = $productQuery[0];
        }
        # accessing the data from variable in the saveReview method below
        $reviewSaved = $this->app->old('reviewSaved');
        # then make sure it is available to the view
        return $this->app->view(
            'products/show',
            ['product' => $product,
            'reviewSaved' => $reviewSaved,
        ]);
    }
    public function saveReview()
    {     
        $this->app->validate([
            'sku' => 'required',
            'product_id' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);
        # If the above validation checks fail
        # The user is redirected back to where they came from (/product)
        # None of the code that follows will be executed
        # if using $_GET or $POST superglobals, //dump($_POST['sku']);
        # instead use input() from the framework, allows for second parameter
        $product_id = $this->app->input('product_id');
        $sku = $this->app->input('sku');
        $name = $this->app->input('name');
        $review = $this->app->input('review');
        
        # Signature: //$app->db()->insert(string $table, array $data)
        # the statement below replaces 15 lines of code!
        $this->app->db()->insert('reviews', [
            'product_id' => $product_id,
            'name' => $name,
            'review' => $review
        ]);
# check with terminal mysql> SELECT * FROM reviews \G see product added
        return $this->app->redirect('/product?sku=' . $sku, ['reviewSaved' => true]);
    }
    public function saveNew()
    {      
        $this->app->validate([
            'sku' =>  'required',
            'name' =>  'required',
            // 'description' => 'required',
            // 'price' =>  'required',
            // 'available' =>  'required',
            // 'weight' =>  'required',
            // 'perishable' =>  'required'
        ]);
        # If the above validation checks fail
        # The user is redirected back to where they came from (/product)
        # None of the code that follows will be executed

        // $product_id = $this->app->input('product_id');
        $sku = $this->app->input('sku');
        $name = $this->app->input('name');
        $description = $this->app->input('description');
        $price = $this->app->input('price');
        $available = $this->app->input('available');
        $weight = $this->app->input('weight');
        $perishable = $this->app->input('perishable');

        $this->app->db()->insert('products', [
            // 'product_id' => $product_id,
            'sku' => $sku,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'available' => $available,
            'weight' => $weight,
            'perishable' => $perishable
        ]);
       
        # Signature: //$app->db()->insert(string $table, array $data)
        # the statement below replaces 15 lines of code!
        // $this->app->db()->insert('new', [
        //     'sku' => $sku,
        //     'name' => $name,
        //     'description' => $description,
        //     'price' => $price,
        //     'available' => $available,
        //     'weight' => $weight,
        //     'perishable' => $perishable       
        // ]);
            return $this->app->view(
            'products/new'
);

# check with terminal mysql> SELECT * FROM new \G see product added
        return $this->app->redirect('/product?sku=' . $sku, ['new' => true]);
    }

}