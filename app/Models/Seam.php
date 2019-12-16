<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Seam extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product',
        'price',
        'medidas',
        'status',
        'count_clothes',
        'type'
    ];
}
