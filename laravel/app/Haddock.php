<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Haddock extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quotes_haddock';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote',
    ];
}
