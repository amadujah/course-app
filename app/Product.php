<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['libelle', 'disponibilite', 'price', 'categorie', 'image'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
