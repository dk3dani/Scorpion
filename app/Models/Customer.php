<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Customer extends Model
{
   
    use SoftDeletes;
    protected $fillable = [
        'name',
        'type',
        'cpf',
        'phone',
        'tel',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];

    public static function listaCustomers($paginate)
    {
    $listaCustomers = DB::table('customers')
    ->join('addresses','customer_id','=','customers.id')
    ->select('customers.id','customers.name','addresses.street','addresses.number',
    'addresses.district','addresses.complement', 'addresses.cep','addresses.city','customers.type','customers.tel')

    ->paginate($paginate);

return $listaCustomers;
}


public function address() {
    return $this -> hasOne(Address::class);
  }

}
