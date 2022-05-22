<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Demand
 *
 * @property int $id
 * @property string $status
 * @property int $user_id
 * @property int $training_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $estimate_id
 * @property-read \App\Models\Estimate|null $estimate
 * @property-read \App\Models\Training $training
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Demand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereEstimateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereTrainingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demand whereUserId($value)
 * @mixin \Eloquent
 */
class Demand extends Model
{
    use HasFactory;
    protected $guarded=["create_at","updated_at"];

    public function training() {
        return $this->belongsTo(Training::class);
    }
    // Eleve
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Estimate
    public function estimate() {
        return $this->belongsTo(Estimate::class);
    }
}
