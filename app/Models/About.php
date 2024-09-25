<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int|null $id
 * @property int $region_id
 * @property string $content
 * @method static truncate()
 */
class About extends Model
{
    use HasFactory;
}
