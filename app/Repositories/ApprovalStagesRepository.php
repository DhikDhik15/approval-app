<?php

namespace App\Repositories;

use App\Models\ApprovalStages;

class ApprovalStagesRepository
{
    public function store(array $data)
    {
        return ApprovalStages::create($data);
    }
}
