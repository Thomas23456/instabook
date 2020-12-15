<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Classe pivot GroupUser qui met en évidence les relations entre la classe Group et User
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class GroupUser extends Pivot
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
     * Renvoi le groupe lié à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Renvoi l'utilisateur lié au groupe
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
