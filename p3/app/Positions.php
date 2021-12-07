<?php

namespace App;

class Positions
{

    # Properties
    public $positions = [];

    # Methods
    public function __construct($dataSource)
    {
        $json = file_get_contents($dataSource);
        $this->positions = json_decode($json, true);
    }

    public function getAll()
    {
        return $this->positions;
    }

    public function getById(int $id)
    {
        return $this->positions[$id] ?? null;
    }

    public function getByValue(string $value)
    {
        $positionId = array_search($value, array_column($this->positions, 'value', 'id'));
        return $this->getById($positionId);
    }
}