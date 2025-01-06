<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'status', 'description', 'department', 'designation', 'brand'];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}