<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beoordeling extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beoordelingen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'beoordeling', 'gebruiker_id', 'product_id',
    ];

    /**
     * Get the product belongs to the review.
     */
    public function beoordeling()
    {
        return $this->belongsTo('App\Product');
    }
}
