<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApprovalStagesRequest;
use App\Http\Resources\ApprovalStagesResource;
use App\Repositories\ApprovalStagesRepository;

class ApprovalStagesController extends Controller
{
    protected $approval;

    public function __construct(ApprovalStagesRepository $approval) {
        $this->approval = $approval;
    }

    public function store(ApprovalStagesRequest $request)
    {
        try {
            $store = $this->approval->store($request->approve());

            return new ApprovalStagesResource($store);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
