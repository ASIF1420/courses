<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['module_id', 'text', 'status'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}