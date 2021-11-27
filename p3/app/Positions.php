    # Methods
    public function __construct($dataSource)
    {
    $json = file_get_contents($dataSource);
    $this->products = json_decode($json, true);
    }

    public function getAll()
    {
    return $this->positions;
    }

    public function getById(int $id)
    {
    return $this->positions[$id] ?? null;
    }

    public function getBySku(string $spot)
    {
    $positionId = array_search($spot, array_column($this->positions, 'spot', 'id'));
    return $this->getById($positionId);
    }
    }