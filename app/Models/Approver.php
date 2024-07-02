<?php

namespace App\Models;

use App\Models\ApprovalStages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approver extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'approvers';

    protected $guarded = ['id'];

    public function approveStages()
    {
        return $this->hasMany(ApprovalStages::class, 'approver_id'); //relation to approval_stages
    }
}
