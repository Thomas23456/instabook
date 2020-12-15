<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Classe pivot PhotoTag qui met en évidence les relations entre la classe Photo et Tag
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class PhotoTag extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @see https://laravel.com/docs/8.x/eloquent-relationships#defining-custom-intermediate-table-models
     * @var bool
     */
    public $incrementing = true;

    /**
     * Renvoi le tag lié à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    /**
     * Renvoi la photo liée au tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
