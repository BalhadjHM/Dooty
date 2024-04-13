<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create(array $array)
 */
class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'space_id',
    ];
}
