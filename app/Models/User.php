<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Classe User qui met en évidence ses relations
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Renvoi les commentaires liés à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Renvoi les photos liées à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function photos() {
        return $this->hasMany(Photo::class);
    }

    /**
     * Renvoi les groupes liés à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function groups() {
        return $this->belongsToMany(Group::class)
                    ->using("App\Models\GroupUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }

    /**
     * Renvoi les photos liées à l'utilisateur en passant par la table pivot PhotoUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function photosAppearance(){
            return $this->belongsToMany(Photo::class)
                    ->using("App\Models\PhotoUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }
}
