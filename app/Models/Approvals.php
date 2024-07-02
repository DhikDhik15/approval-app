<?php

namespace App\Models;

use App\Models\Approver;
use App\Models\Statuses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approvals extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'approvals';

    protected $guarded = ['id'];

    public function status()
    {
        return $this->hasOne(Statuses::class, 'id', 'status_id');
    }

    public function approver()
    {
        return $this->hasOne(Approver::class, 'id', 'approver_id');
    }
}
