<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Customer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'type',
        'cpf',
        'phone',
        'tel',
        'user_id',
        'addres_id',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];

    public static function listaCustomers($paginate)
    {
    $listaCustomers = DB::table('customers')
    ->join('users','users.id','=','customers.user_id')
    ->join('address','addres_id','=','customers.addres_id')
    ->select('users.name','customers.phone','address.street','address.number',
    'address.district','address.complement', 'address.cep','address.city','customers.type','users.name','customers.tel')

    ->paginate($paginate);

return $listaCustomers;
}
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function addres()
    {
        return $this->belongsTo('App\Models\Address');
    }
}
