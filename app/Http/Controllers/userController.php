<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Enfermero;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index() {
    	$users = User::all();
        $enfermeros = Enfermero::all();

    	return view('usuarios.index', compact('users', 'enfermeros'));
    }

    public function create() {
        if (auth()->user()->role == 'admin') {
    	   return view('usuarios.create');
        } else {
            return redirect('/error-rol');
        }
    }

    public function store(Request $request) {

        if (auth()->user()->role == 'admin') {

        $this->validate($request, [
            'apelnom' => 'required|string',
            'DNI' => 'required|integer|unique:users',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|string',
        ]);

        $user = new User();
        $user->apelnom = $request->input('apelnom');
        $user->DNI = $request->input('DNI');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $ultimoId = $user->id;

        if ($user->role == 'enfermero') {
            $enfermero = new Enfermero();
            $enfermero->user_id = $ultimoId;
            $enfermero->RUP = $request->input('RUP');
            $enfermero->telefono = $request->input('telefono');
            $enfermero->save();
        }

        return redirect()->route('usuarios.index');
        } else {
            return redirect('/error-rol');
        }
    }

    public function edit(User $user, $id) {
        if (auth()->user()->role == 'admin') {
            $user = User::findOrFail($id);
    	   return view('usuarios.edit', compact('user'));
        } else {
            return redirect('/error-rol');
        }
    }

    public function update(Request $request, $id) {
        if (auth()->user()->role == 'admin') {

        $this->validate($request, [
            'apelnom' => 'string',
            'DNI' => 'integer',
            'email' => 'email',
            'password' => 'string',
        ]);

        $user = User::findOrFail($id);
        $user->apelnom = $request->input('apelnom');
        $user->DNI = $request->input('DNI');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $userId = $user->id;

        if ($user->role == 'enfermero') {
            $enfermero = Enfermero::where('user_id',$userId)->firstOrFail();
            $enfermero->RUP = $request->input('RUP');
            $enfermero->telefono = $request->input('telefono');
            $enfermero->save();
        }

        return redirect()->route('usuarios.index');
        } else {
            return redirect('/error-rol');
        }
    }

    public function destroy(User $user, $id) {
        if (auth()->user()->role == 'admin') {
            $user = User::findOrFail($id);

    	   $user->delete();

            return redirect()->route('usuarios.index');
        } else {
            return redirect('/error-rol');
        }
    }
}
