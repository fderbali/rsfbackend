<?php

namespace App\Models;


use App\Models\Blacklisteduser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Blacklisteduser
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blacklisteduser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blacklisteduser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blacklisteduser query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blacklisteduser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blacklisteduser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blacklisteduser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blacklisteduser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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