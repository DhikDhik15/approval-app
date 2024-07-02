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

    public function show(int $id)
    {
        $find = Expense::find($id);

        $response = [
            'id' => $find->id,
            'amount' => $find->amount,
            'status' => [
                'id' => $find->status->id,
                'name' => $find->status->name
            ],
            'approval' => $this->dataApproval($find)
        ];

        return $response;
    }

    private function dataApproval($find)
    {
        $result = [];
        foreach ($find->approval as $approval) {
            $result[] = [
                'id' => $approval->id,
                'approver' => [
                    'id' => $approval->approver->id,
                    'name' => $approval->approver->name
                ],
                'status' => [
                    'id' => $approval->status->id,
                    'name' => $approval->status->name
                ]
            ];
        }
        return $result;
    }
}
