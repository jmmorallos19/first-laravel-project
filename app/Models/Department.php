<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name','location', 'description'];

    /** @use HasFactory<\Database\Factories\DepartmentsFactory> */
    use HasFactory;

    public function member() {
        return $this->hasMany(member::class);
    }
}
