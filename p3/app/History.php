<?php

namespace App;

class History
{
    # Properties
    public $history = [];

    # Methods
    public function __construct($dataSource)
    {
        $json = file_get_contents($dataSource);
        $this->products = json_decode($json, true);
    }

    public function getAll()
    {
        return $this->history;
    }

    public function getById(int $id)
    {
        return $this->history[$id] ?? null;
    }

    public function getBySku(string $round)
    {
        $historyId = array_search($sku, array_column($this->history, 'round', 'id'));
        return $this->getById($productId);
    }
}