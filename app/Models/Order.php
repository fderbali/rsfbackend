<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function training(){
        return $this->belongsTo(Training::class);
    }

    public function estimate(){
        return $this->belongsTo(Estimate::class);
    }
}
