<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $guarded=["create_at","updated_at"];

    public function demands(){
        return $this->hasMany(Demand::class);
    }

    // Prof
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function estimates(){
        return $this->hasManyThrough(Estimate::class, Demand::class);
    }
}
