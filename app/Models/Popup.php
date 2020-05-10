<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Popup
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $hash
 * @property int $width
 * @property int $height
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Popup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'hash',
        'width',
        'height'
    ];

    /**
     * @return HasMany
     */
    public function popupItem()
    {
        return $this->hasMany(PopupItem::class);
    }
}
