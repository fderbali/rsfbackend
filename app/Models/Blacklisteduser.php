<?php

namespace App\Models;


use App\Models\Blacklisteduser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blacklisteduser extends Model
{
    use HasFactory;

    protected $fillable = ['email'];
    protected $guarded=['create_at','updated_at'];

    ////////////////////////////////////
    // Si  on ajoute une table connexion qui rellera la table users avec table blacklisteduser , on pourra alors refuser l'authantification au départ
    // // pour le moment aucune relation existante! 
    public function Blacklisted(){
    return $this->belongsTo(Blacklisteduser::class);
    }
    ////////////////////////////////////
}