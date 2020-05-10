<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class PopupItem
 * @package App\Models
 *
 * @property int    $id
 * @property string $type
 * @property int    $size
 * @property int    $order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class PopupItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'size',
        'order',
    ];

    /**
     * @return BelongsTo
     */
    public function popup()
    {
        return $this->belongsTo(Popup::class);
    }
}
