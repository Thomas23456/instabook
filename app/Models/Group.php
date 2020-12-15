<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Group qui met en évidence ses relations
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class Group extends Model
{
    use HasFactory;

    /**
     * Renvoi les photos liées au groupe
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function photos() {
        return $this->hasMany(Photo::class);
    }

    /**
     * Renvoi les utilisateurs liés au groupe
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class)
                    ->using("App\Models\GroupUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }
}
