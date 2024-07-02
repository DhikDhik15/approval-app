<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApprovalStagesRequest;
use App\Http\Resources\ApprovalStagesResource;
use App\Repositories\ApprovalStagesRepository;

class ApprovalStagesController extends Controller
{
    // declare constructor parameters
    protected $approval;

    public function __construct(ApprovalStagesRepository $approval) {
        $this->approval = $approval;
    }

    public function store(ApprovalStagesRequest $request)
    {
        try {
            $store = $this->approval->store($request->approve()); //send data to repository

            return new ApprovalStagesResource($store); //return response from store

        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }

    public function update(ApprovalStagesRequest $request,int $id)
    {
        try {
            $update = $this->approval->update($request->approve(), $id); //send data to repository

            return new ApprovalStagesResource($update);

        } catch (\Throwable $th) {
            return response()->json(500);
        }
    }
}
