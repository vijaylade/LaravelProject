<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveModel extends Model
{
    use HasFactory;

    protected $table = 'leave';
    protected $primarykey = 'id';
}
