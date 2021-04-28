<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index() {
    	$users = User::all();

    	return view('usuarios.index', compact('users'));
    }

    public function create() {
    	return view('usuarios.create');
    }

    public function store(Request $request) {
    	
        $this->validate($request, [
            'apelnom' => 'required|string',
            'DNI' => 'required|integer|unique:users',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'RUP' => 'nullable|integer|unique:users',
            'telefono' => 'nullable|integer',
            'password' => 'required|string',
        ]);

        $user = new User();
        $user->apelnom = $request->input('apelnom');
        $user->DNI = $request->input('DNI');
        $user->email = $request->input('email');
        $user->RUP = $request->input('RUP');
        $user->role = $request->input('role');
        $user->telefono = $request->input('telefono');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('usuarios.index');
    }

    public function show(User $user, $id) {
        $user = User::findOrFail($id);
    	return view('usuarios.show', compact('user'));
    }

    public function edit(User $user, $id) {
        $user = User::findOrFail($id);
    	return view('usuarios.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id) {
        $user = User::findOrFail($id);

        $user->update($request->validated());
        return redirect()->route('usuarios.index');
    }

    public function destroy(User $user, $id) {
        $user = User::findOrFail($id);

    	$user->delete();

        return redirect()->route('usuarios.index');
    }
}
