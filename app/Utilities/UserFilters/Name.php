<?php

namespace App\Utilities\UserFilters;

use App\Utilities\FilterContract;

class Name implements FilterContract {
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->where('name', 'like', '%' . $value . '%');
    }
}
