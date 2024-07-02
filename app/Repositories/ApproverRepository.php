<?php

namespace App\Repositories;

use App\Models\Approver;

class ApproverRepository
{
    public function store(array $data)
    {
        return Approver::create($data);
    }
}
