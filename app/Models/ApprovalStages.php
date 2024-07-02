<?php

namespace App\Models;

use App\Models\Approver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApprovalStages extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'approval_stages';

    protected $guarded = ['id'];

    public function approver()
    {
        return $this->belongsTo(Approver::class, 'approver_id', 'id'); //relation to approver
    }
}
