<?php

namespace App\Http\Controllers;

use App\Models\Seam;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paidAt = $request->input('paid_at');

        $seamsQuery = Seam::query()->where('seams.paid', '=', true);

        if ($paidAt) {
            $seamsQuery->where('paid_at', '=', $paidAt);
        }

        return view('sales.index', [
            'seams' => $seamsQuery->paginate(6)
        ]);
    }
}
