<?php

namespace App\Repositories;

use App\Models\Expense;

class ExpenseRepository
{
    public function store(array $data)
    {
        return Expense::create($data);
    }
}
