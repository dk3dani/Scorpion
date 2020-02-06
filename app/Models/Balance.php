<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Balance extends Model
{

    protected $fillable = [
        'name',
        'amount',
        'bankname',
        'seam_id'
    ];

    public function seam() {
        return $this -> belongsTo(Seam::class);
      }

    public static function listBalances($paginate)
    {
    $listBalances = DB::table('balances')
     ->leftJoin('seams','seams.id','=','balances.seam_id')
    ->select('balances.id','balances.name','balances.product','seams.amount','seams.price')

    ->paginate($paginate);

return $listBalances;
}
}
