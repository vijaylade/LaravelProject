<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpModel extends Model
{
    use HasFactory;

    protected $table = "employee";
    protected $primarykey = "eid";

    public function employee()
    {
        return $this->belongsTo(User::class);
        
    }

    

}
