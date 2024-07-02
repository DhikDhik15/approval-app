<?php

namespace App\Repositories;

use App\Models\ApprovalStages;

class ApprovalStagesRepository
{
    public function store(array $data)
    {
        return ApprovalStages::create($data);
    }

    public function update(array $data, int $id)
    {
        $find = ApprovalStages::find($id);

        $find->update($data);

        return $find;
    }
}
