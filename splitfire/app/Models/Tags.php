<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Model de la table Tags permettant de l'utiliser dans laravel grâce à Eloquent
class Tags extends Model
{
    use HasFactory;

    //La seule colonne que l'on peut modifier est la colonne tag
    protected $fillable = [
        'tag'
    ];

    //Ajout de la relation  N:N (plusieurs tags peuvent avoir plusieurs tweets)
    public function tweets(){
        return $this->belongsToMany(Tweets::class);
    }
}
