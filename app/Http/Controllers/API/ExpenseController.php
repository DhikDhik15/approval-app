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
}
