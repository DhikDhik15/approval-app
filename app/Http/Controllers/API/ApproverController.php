<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApproverRequest;
use App\Http\Resources\ApproverResource;
use App\Repositories\ApproverRepository;

class ApproverController extends Controller
{
    // declare constructor parameters
    protected $approver;

    public function __construct(ApproverRepository $approver) {
        $this->approver = $approver;
    }

    public function store(ApproverRequest $request)
    {
        try {
            $store = $this->approver->store($request->approve()); //send data to repository

            return new ApproverResource($store); //return response from store

        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }
}
