<?php

namespace App\Controllers;

use App\Positions;

class HistoryController extends Controller
{
    public function index()
    {
        $history = $this->app->db()->all('history'); # parameter for

        return $this->app->view('history/index', ['history' => $history]);
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
}