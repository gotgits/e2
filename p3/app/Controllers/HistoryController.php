<?php

namespace App\Controllers;

use App\Positions;

class HistoryController extends Controller
{
    public function index()
    {
        // return 'This is the history index...';
        $positionsObj = new Positions($this->app->path('database/positions.json'));

        $positions = $positionsObj->getAll();
        dump($positions);
        return $this->app->view('history/index', ['positions' => $positions]);
    }

    // public function show()
    // {    # a terse version for an absolute path instance,
    //     # using the param method to retrieve route parameters/query string values:
    //     $sku = $this->app->param('sku');

    //     if (is_null($sku)) {
    //         $this->app->redirect('/history');
    //     }
    //     # Signature //$app->db()->findByColumn(string $table, string $column, string $operator, mixed $value)
    //     $roundQuery = $this->app->db()->findByColumn('history', 'sku', '=', $sku);

    //     if (empty($roundQuery)) {
    //         return $this->app->view('round/missing');
    //     } else {
    //         $round = $roundQuery[0];
    //     }
    //     # accessing the data from variable in the saveReview method below
    //     $roundSaved = $this->app->old('roundSaved');
    //     $rounds = $this->app->db()->findByColumn('rounds', 'round_id', '=', $round['id']);
    //     # make available to the view
    //     return $this->app->view('history/show', [
    //         'rounds' => $rounds,
    //         'roundSaved' => $roundSaved,
    //         'round' => $round
    //     ]);
    // }
}