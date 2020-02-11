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
        'paid',
        'paid_at',
        'count_clothes',
        'type',
        'date_out',
        'date_in',
        'customer_id'
    ];

   protected $dates = [

         'date_in',
        'date_out',
        'updated_at',
        'created_at',
         ' paid_at'

];
   

    protected $casts = [
        'active' => 'boolean',
        'created_at' => 'datetime:d/m/Y',
        'date_in' => 'datetime:d/m/Y',
        'date_out' => 'datetime:d/m/Y',
        'paid_at'  => 'datetime:d/m/Y',
    ];

    public function setPaidAttribute ($paid) {
        if ($paid) {
            $this->attributes['paid_at'] = new \DateTime();
        } else {
            $this->attributes['paid_at'] = null;
        }

        $this->attributes['paid'] = $paid;
    }

    public function balance() {
        return $this ->hasMany(Balance::class);
      }
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
