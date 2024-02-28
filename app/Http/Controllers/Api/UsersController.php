<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Esp;

class UsersController extends Controller {

    public function show(Request $request){
        $user = User::find($request->userId);
    }

    public function index(Request $request) {
        $esp = Esp::find($request->esp_id);
        $esp->load('users');
        $users = $esp->users;

        return response()->json([
            'users' => $users
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ], [
            'email.unique' => 'El usuario que intentas crear ya existe.',
            'email.required' => 'El Correo Electrónico es obligatorio',
            'email.email' => 'Debes ingresar un correo electrónico válido',
            'password.required' => 'La contraseña es obligatoria.',
        ]);


        $user = User::firstOrCreate([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);

        $user->esps()->syncWithoutDetaching([$request->esp_id]);

        return response()->json([
            'message' => 'Usuario creado con éxito!'
        ]);
    }

    public function edit(Request $request){
        $user = User::find($request->id);
        $user->load('esps');
        
        $esp = $user->esps->find($request->esp_id);

        return response()->json([
            'user' => $user,
            'esp' => $esp
        ]);    

    }

    public function associate(Request $request){
        $esp = Esp::find($request->esp_id);
        $selectedUsers = $request->input('selectedUsers', []);
        $selectedUsers = collect($selectedUsers)->pluck('id')->toArray();

        $esp->users()->syncWithoutDetaching($selectedUsers);

        return response()->json([
            'message' => 'Usuario ascociado con éxito',
        ]);
    }

    public function updateProfile(Request $request){
        $user = User::find($request->userId);
        if($request->password){
            $user->password = bcrypt($request->password);
        }

        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return response()->json([
            'message' => "Perfil actualizado con éxito"
        ]);    
    }

    public function updateAvatar(Request $request){
        $user = User::find($request->user_id);
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $path = public_path(). '_html/avatars/' ;
            $fileName = time() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $fileUri = '/avatars/'. $fileName;
            $user->avatar = $fileUri;
        }

        $user->save();

        return response()->json([
            'message' => "Perfil actualizado con éxito",
            'avatar' => $user->avatar
        ]);   

    }

    public function searchUser(Request $request){

        $users = User::where('email', 'LIKE', "%$request->email%")->get();

        return response()->json([
            'users' => $users
        ]);

    }   



    public function update(Request $request) {
        $authUser = $request->user();
        $authUser->load('esps');
        $espId = $request->esp_id;

        if($authUser->esps->where('id', $espId)->first()->pivot->role == "Administrador"){
            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password){ 
                $user->password = bcrypt($request->password);
            }
            $user->save();

            $user->esps()->updateExistingPivot($request->esp_id, [
                'role' => $request->role,
            ]);

            return response()->json([
                'message' => 'Usuario actualizado con éxito'
            ]);

        }

        return response()->json([
            'error' => 'No authorizado'
        ]);

    }

    public function destroy(Request $request){
        $authUser = $request->user();
        $authUser->load('esps');
        $espId = $request->esp_id;

        if($authUser->esps->where('id', $espId)->first()->pivot->role == "Administrador"){
            $user_id = $request->user_id;
            $esp_id = $request->esp_id;

            $user = User::find($user_id);
            $user->esps()->detach($esp_id);

            $esp = Esp::find($esp_id);
            $users = $esp->users;

            return response()->json([
                'users' => $users
            ]);
        }

        return response()->json([
            'error' => 'No authorizado'
        ]);
    }
}