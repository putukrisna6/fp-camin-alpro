<?php

namespace App\Utilities\GroupFilters;

use App\Utilities\FilterContract;

class Industry implements FilterContract {
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->where('industry', $value);
    }
}
