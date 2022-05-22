<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
