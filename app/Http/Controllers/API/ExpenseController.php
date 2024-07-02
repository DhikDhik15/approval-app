<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Repositories\ExpenseRepository;

class ExpenseController extends Controller
{
    protected $expense;

    public function __construct(ExpenseRepository $expense) {
        $this->expense = $expense;
    }

    public function store(ExpenseRequest $request)
    {
        try {
            $store = $this->expense->store($request->amount());

            return new ExpenseResource($store);

        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }

    public function approve(Request $request, $id)
    {
        try {
            $approve = $this->expense->approve($request->all(),config('enums.status.DISETUJUI'), $id);

            return new ExpenseResource($approve);

        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }

    public function show(int $id)
    {
        try {
            $get = $this->expense->show($id);

            return new ExpenseResource($get);
        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }
}
