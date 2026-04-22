<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'name', 'nim', 'address', 'profile_photo'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
