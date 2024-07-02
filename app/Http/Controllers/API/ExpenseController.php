<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Repositories\ExpenseRepository;

class ExpenseController extends Controller
{
    // declare constructor parameters
    protected $expense;

    public function __construct(ExpenseRepository $expense) {
        $this->expense = $expense;
    }

    public function store(ExpenseRequest $request)
    {
        try {
            $store = $this->expense->store($request->amount()); //send data to repository

            return new ExpenseResource($store); //return response

        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }

    public function approve(Request $request, $id)
    {
        try {
            $approve = $this->expense->approve($request->all(),config('enums.status.DISETUJUI'), $id); //send data to repository

            return new ExpenseResource($approve); //return response

        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }

    public function show(int $id)
    {
        try {
            $get = $this->expense->show($id); //send data to repository

            return new ExpenseResource($get); //return response
        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }
}
