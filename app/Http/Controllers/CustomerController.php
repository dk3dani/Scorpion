<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $listaCustomers = Customer::listaCustomers(6);
        // $listaCustomers= json_encode(Customer::all());
       // dd($listaCustomers);
       if(session('success_message')){
        Alert::success('Sucesso', session('success_message'));
       }

        return view('customer.index',compact('listaCustomers'));


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
        $validacao = \Validator::make($data,[
            'name' => 'required|string|max:255'

          ]);

          if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
          }

          Customer::create($data);
          return redirect()->back()->withSuccessMessage('Cliente foi criado com sucesso');
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customer::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
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
        $validacao = \Validator::make($data,[
            'name' => 'required|string|max:255'

          ]);

          if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
          }


      Customer::find($id)->update($data);
      return redirect()->back()->withSuccessMessage('Cliente atualizado com sucesso');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->forceDelete();
        return redirect()->back();
    }
}
