<?php

namespace App\Controllers;

use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
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
        $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $product['id']);
        # make available to the view
        return $this->app->view('products/show', [
            'product' => $product,
            'reviewSaved' => $reviewSaved,
            'reviews' => $reviews
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
    public function new()
    {
        $newSaved = $this->app->old('newSaved');
        $sku = $this->app->old('sku');
        # return statement makes the saveNew method available to the view new.blade.php
        return $this->app->view('products/new', [
            'newSaved' => $newSaved,
            'sku' => $sku,
        ]);
    }
    public function saveNew()
    {
        $this->app->validate([
            'name' => 'required',
            'sku' => 'required',
            'description' => 'required|maxLength:600',
            'price' => 'required|numeric',
            'available' => 'required|digit',
            'weight' => 'required|numeric',
            // 'perishable' =>  'required'
        ]);
        # If validation checks fail, code that follows will not be executed
        # The user is redirected back to /product/new
        # Maintaining flash data for the current inputs rather than clearing

        $newSaved = [
            'name' => $this->app->input('name'),
            'sku' => $this->app->input('sku'),
            'description' => $this->app->input('description'),
            'price' => $this->app->input('price'),
            'available' => $this->app->input('available'),
            'weight' => $this->app->input('weight'),
            'perishable' => $this->app->input('perishable')
        ];
        $this->app->db()->insert('products', $newSaved);

        $this->app->redirect('/products/new', [
            'newSaved' => true,
        ]);
    }
}