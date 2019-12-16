<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $customer =  Customer::create( [
            "name" =>$request->input('name'),
            "cpf" =>$request->input('cpf'),
            "phone" =>$request->input('phone'),

        ]);
        $address = Address::create([
            "street" => $data['street'],
            "number"=> $data['number'],

        ]);
        $customer->address()->save($address);
        return redirect()->back();
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
       // dd($data);

        Customer::find($id)->update($data);
        return redirect()->back();
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Address::where('customer_id' ,$id)->forceDelete();
       Customer::where('id' ,$id)->forceDelete();


        return redirect()->back()->with('success','Cadastrado com Sucesso');
    }
}
