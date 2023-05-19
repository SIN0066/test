<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['jan', 'name'];

    public function photos()
    {
        return $this->hasMany('App\ItemPhoto');
    }
    
}
