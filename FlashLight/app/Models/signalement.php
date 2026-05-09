<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class signalement extends Model
{
    protected $table = 'signalement';
    protected $primaryKey = 'id_signalement';
    protected $fillable = [
        'categorie',
        'titre',
        'description',
        'quartier',
        'adresse',
        'latitude',
        'longitude',
        'type_urgence',
        'photo',
        'etat',
        'id_user'
    ];
    protected $casts = [
        'photo' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function categorie()
    {
        return $this->belongsTo(categorie::class, 'id_categorie');
    }
}
