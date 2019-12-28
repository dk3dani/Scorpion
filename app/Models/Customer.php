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
        'phone',
        'street',
        'number',
        'district',
        'city',
        'type',
        'cpf',
        'phone',
        'tel',
        'deleted_at'
    ];
    protected $dates = ['deleted_at'];
    public function seams() {
        return $this ->hasMany(Seam::class);
      }

    public static function listaCustomers($paginate)
    {
    $listaCustomers = DB::table('customers')
    ->select('customers.id','customers.name','customers.cpf','customers.phone','customers.street','customers.number',
    'customers.district','customers.city','customers.type')

    ->paginate($paginate);

return $listaCustomers;
}


}
