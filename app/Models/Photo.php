<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Photo qui met en évidence ses relations
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class Photo extends Model
{
    use HasFactory;

    /**
     * Renvoi les commentaires liés à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Renvoi le groupe lié à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function group() {
        return $this->belongsTo(Group::class);
    }

    /**
     * Renvoi le propriétaire lié à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function owner() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Renvoi les utilisateurs liés à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class)
                    ->using("App\Models\PhotoUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }

    /**
     * Renvoi les tags liés à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function tags() {
        return $this->belongsToMany(Tag::class)
                    ->using("App\Models\PhotoTag")
                    ->withPivot("id")
                    ->withTimestamps();
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {   
        /**
         * La photo n'est créée que si son propriétaire appartient bien au même groupe que la photo
         * 
         */
        //Si la fonction renvoit faux, la création ne se fait pas, sinon elle s'effectue
        static::creating(function ($photo) {
            return $photo->group->users->find($photo->user_id ) !== null; 
        });
    }
}
 