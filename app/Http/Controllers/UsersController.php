<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Esp;

class UsersController extends Controller{

    public function index(){
        $users = User::all();
        $esps = Esp::all();
        return view('users.index', [
            'users' => $users
        ]);

    }

    public function create(){
        return view('users.create');
    }



    public function store(Request $request){
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->identification_card = $request->identification_card;
        $user->age = $request->age;
        $user->save();

        return redirect()->back()->with('message', 'Usuario Creado con exito!');

    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update($id, Request $request){
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->identification_card = $request->identification_card;
        $user->age = $request->age;

        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('message', 'Usuario modificado con exito!');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->esps()->detach();
        $user->delete();

        return response()->json([
            'message' => "Usuario eliminado con exito!"
        ]);
    }

    public function show($id){
        $user = User::find($id);

        return view('users.show', [
            'user' => $user
        ]);
    }

}

