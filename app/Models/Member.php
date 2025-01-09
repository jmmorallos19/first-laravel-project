<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'age', 'skill', 'bio', 'department_id'];

    /** @use HasFactory<\Database\Factories\MembersFactory> */
    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
