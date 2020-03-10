<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

public function index()
{
    if (session('success_message')) {
        Alert::success('Sucesso', session('success_message'));
    }

return view('profile.index');

}

public function update(Request $request)
{    $data = $request->all();


       if ($data['password'] != null)
           $data['password'] = bcrypt($data['password']);
       else
       unset($data['password']);


        $update = auth()->user()->update($data);
        if( $update)
        return redirect()->back()->withSuccessMessage('Seu perfil foi atualizado com sucesso');
        dd($request->all());
}



}
