<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model de la table Tweets permettant de l'utiliser dans laravel grâce à Eloquent
class Tweets extends Model
{
    use HasFactory;

    //Les seules colonnes que l'on peut modifier sont les colonnes auteur et message
    protected $fillable = [
        'auteur',
        'message'
    ];

    //Ajout de la relation  N:N (plusieurs tweets peuvent avoir plusieurs tags)
    public function tags(){
        return $this->belongsToMany(Tags::class);
    }
}
