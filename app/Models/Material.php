<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['module_id', 'type', 'file', 'link'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
