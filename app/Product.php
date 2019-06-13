<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naam', 'beschrijving', 'prijs',
    ];

    /**
     * Get the reviews for the product.
     */
    public function beoordelingen()
    {
        return $this->hasMany('App\Beoordeling', 'id', 'beoordeling_id');
    }
}
