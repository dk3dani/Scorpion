<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Seam;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        if (session('success_message')) {
            Alert::success('Sucesso', session('success_message'));
        }

        $listSeams = Seam::listSeams(6);

        return view('seam.index', compact('listSeams', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $value = $request->price;
        $formattedValue = str_replace(',', '.', str_replace('.', '', $value));
        //  dd( $data);
        $data["price"] = $formattedValue;

        $validacao = \Validator::make($data, [
            'product' => 'required|string|max:255'

        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        }
        //  $data['paid'] = $request->input('paid') ? true : false;
        Seam::create($data);

        return redirect()->back()->withSuccessMessage('Seu pedido foi criado com sucesso');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Seam::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seam  $seam
     * @return \Illuminate\Http\Response
     */
    public function edit(Seam $seam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = $request->price;
        $formattedValue = str_replace(',', '.', str_replace('.', '', $value));
        $data["price"] = $formattedValue;

        $validacao = \Validator::make($data, [
            'product' => 'required|string|max:255'

        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        // $data['paid'] = $request->input('paid') ? true : false;

        Seam::find($id)->update($data);
        return redirect()->back()->withSuccessMessage('Seu pedido foi atualizado com sucesso');;
    }


    /**
     * @param Seam $seam
     * @return \Illuminate\Http\JsonResponse
     */
    public function markPaid(Seam $seam)
    {
        $seam->paid = true;
        $seam->save();
        return response()->json([]);

    }
    public function destroy($id)
    {
        Seam::find($id)->forceDelete();
        return redirect()->back();
    }
}
