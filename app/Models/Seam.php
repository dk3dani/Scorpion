<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Seam extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product',
        'description',
        'price',
        'scale',
        'status',
        'count_clothes',
        'type',
        'date_out',
        'date_in',
        'customer_id'
    ];
    public function customer() {
        return $this -> belongsTo(Customer::class);
      }

    public static function listSeams($paginate)
    {
    $listSeams = DB::table('seams')
     ->leftJoin('customers','customers.id','=','seams.customer_id')
    ->select('seams.id','customers.name','seams.product','seams.description','seams.price')

    ->paginate($paginate);

return $listSeams;
}


}
