<?php

namespace App\Models;

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
        return $this->hasMany(Approvals::class, 'expense_id');
    }
}
