<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approvals extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'approvals';

    protected $guarded = ['id'];
}
