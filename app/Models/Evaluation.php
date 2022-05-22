<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Evaluation
 *
 * @property int $id
 * @property float $note
 * @property string $remark
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evaluation whereUserId($value)
 * @mixin \Eloquent
 */
class Evaluation extends Model
{
    use HasFactory;
}
