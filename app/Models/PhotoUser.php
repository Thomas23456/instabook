<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Classe pivot PhotoUser qui met en évidence les relations entre la classe Photo et User
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class PhotoUser extends Pivot
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
     * Renvoi l'utilisateur lié à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Renvoi la photo liée à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {   
        /**
         * Un utilisateur ne peut être ajouté à une photo que si il est dans le même groupe que la photo
         * 
         */
        //Si la fonction renvoit faux, la création ne se fait pas, sinon elle s'effectue
        static::creating(function ($photo_user) {
            return $photo_user->photo->group->users->find($photo_user->user_id ) !== null; 
        });
    }
}
