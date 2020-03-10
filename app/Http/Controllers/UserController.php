<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
{
    $user = auth()->user();
    $data = $request->all();

    if ($data['password'] != null)
           $data['password'] = bcrypt($data['password']);
       else
       unset($data['password']);

        $data['image'] = $user->image;
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            if( $user->image){

                $name = $user->image;
                unlink(storage_path('app/public/users/'.$name));}

            else
            $name =  $user->id.'-'.Str::kebab($user->name);
            $extension =$request->image->extension();
            $nameFile = "{$name}";
            $data['image'] = $nameFile;
           $upload = $request->image->storeAs('users',$nameFile);

            if(!$upload)
                return redirect()
                            ->back()
                             ->with('error', 'falha no upload');
        }




        $update = $user->update($data);
        if( $update)
        return redirect()->back()->withSuccessMessage('Seu perfil foi atualizado com sucesso');
        dd($request->all());
}



}
