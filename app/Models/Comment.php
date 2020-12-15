<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Classe Comment qui met en évidence ses relations
 * 
 * @author Thomas Payan <thomas.payan@ynov.com>
 * 
 */
class Comment extends Model
{
    use HasFactory;

    /**
     * Renvoi la photo liée au commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function photo() {
        return $this->belongsTo(Photo::class);
    }

    /**
     * Renvoi l'utilisateur lié au commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Renvoi la réponse liée au commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function replyTo() {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    } 

    /**
     * Renvoi les réponses liées au commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function replies() {
        return $this->hasMany(Comment::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {   
        /**
         * Un commentaire ne peut être fait que par un utilisateur qui appartient au même groupe que la photo
         * 
         */
        //Si la fonction renvoit faux, la création ne se fait pas, sinon elle s'effectue
        static::creating(function ($comment) {
            return $comment->photo->group->users->find($comment->user_id ) !== null; 
        });
    }
}
