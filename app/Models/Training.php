<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Training
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $thumbnail
 * @property string $level
 * @property string $location
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $category_id
 * @property int $total_duration
 * @property float $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Demand[] $demands
 * @property-read int|null $demands_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estimate[] $estimates
 * @property-read int|null $estimates_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Training newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training query()
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereTotalDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereUserId($value)
 * @mixin \Eloquent
 */
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
