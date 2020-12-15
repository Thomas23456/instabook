<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Tag qui met en évidence ses relations
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class Tag extends Model
{
    use HasFactory;

    /**
     * Renvoi les photos liées au tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function photos(){
        return $this->belongsToMany(Photo::class)
                    ->using("App\Models\PhotoTag")
                    ->withPivot("id")
                    ->withTimestamps();
    }
}
