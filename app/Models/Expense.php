<?php

namespace App\Models;

use App\Models\Statuses;
use App\Models\Approvals;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'expenses';

    protected $guarded = ['id'];

    public function approval()
    {
        return $this->hasMany(Approvals::class, 'expense_id'); //relation to approval
    }

    public function status()
    {
        return $this->hasOne(Statuses::class, 'id', 'status_id'); //relation to status
    }
}
