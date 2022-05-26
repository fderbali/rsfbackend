<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Announce
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $level
 * @method static \Illuminate\Database\Eloquent\Builder|Announce newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announce newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announce query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announce whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announce whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announce whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announce whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announce whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announce whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announce whereUserId($value)
 * @mixin \Eloquent
 */
class Announce extends Model
{
    use HasFactory;
    protected $guarded=["create_at","updated_at"]; 
    
    public function Announce()
    {
        return $this->belongsTo(User::class);
    }
}