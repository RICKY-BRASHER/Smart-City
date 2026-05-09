<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_categorie';
    protected $fillable = ['icone_categorie', 'nom_categorie'];

    public function signalements()
    {
        return $this->hasMany(signalement::class, 'id_categorie');
    }
}
