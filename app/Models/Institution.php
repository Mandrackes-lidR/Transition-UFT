<?php

namespace App\Models;

use Database\Factories\InstitutionFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Institution
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static InstitutionFactory factory(...$parameters)
 * @method static Builder|Institution newModelQuery()
 * @method static Builder|Institution newQuery()
 * @method static Builder|Institution query()
 * @method static Builder|Institution whereCreatedAt($value)
 * @method static Builder|Institution whereId($value)
 * @method static Builder|Institution whereName($value)
 * @method static Builder|Institution whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Institution extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
