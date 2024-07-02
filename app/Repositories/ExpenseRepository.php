<?php

namespace App\Repositories;

use App\Models\Expense;
use App\Models\Approvals;

class ExpenseRepository
{
    public function store(array $data)
    {
        return Expense::create($data);
    }

    public function approve(array $data, int $status, int $id)
    {
        $find = Expense::find($id);
        $find->update([
            'status_id' => $status
        ]);

        Approvals::create([
            'expense_id' => $find->id,
            'approver_id' => $data['approver_id'],
            'status_id' => $status
        ]);

        return $find;
    }
}
