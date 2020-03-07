<?php

namespace App\Http\Controllers;

use App\Models\Seam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentMonth = new \DateTime(date('Y') . '-' . date('m') . '-01');

        $latestSeams = Seam::query()->where('created_at', '>=', $currentMonth)->get();
        $deliveries = Seam::query()->where('date_out', '=', (new \DateTime())->format('Y-m-d'))->get();

        $data = [
            'total' => 0,
            'total_paid' => 0,
            'value_paid' => 0,
            'total_no_paid' => 0,
            'value_no_paid' => 0,
            'value_day' => 0,
        ];

        foreach ($latestSeams as $seam) {
            $data['total']++;

            if ($seam->paid) {
                $data['total_paid']++;
                $data['value_paid'] += ($seam->unformattedPrice ?: 0);
            } else {
                $data['total_no_paid']++;
                $data['value_no_paid'] += ($seam->unformattedPrice ?: 0);
            }
        }

        foreach ($deliveries as $seam) {
            $data['value_day'] += ($seam->unformattedPrice ?: 0);
        }

        return view('home', [
            'data' => $data,
            'deliveries' => $deliveries,
        ]);
    }
}
