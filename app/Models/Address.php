<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'street', 'number', 'complement','district','city','state','cep'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
