<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class userController extends Controller
{
    public function index() {
    	$users = User::all();

    	return view('usuarios.index', compact('users'));
    }

    public function create() {
    	return view('usuarios.create');
    }

    public function store(StoreUserRequest $request) {
    	User::create($request->validated());

        return redirect()->route('usuarios.index');
    }

    public function show(User $user) {
    	return view('usuarios.show', compact('usuario'));
    }

    public function edit(User $user) {
    	return view('usuarios.edit', compact('usuario'));
    }

    public function update(UpdateUserRequest $request, User $user) {
    	$user->update($request->validated());

        return redirect()->route('usuarios.index');
    }

    public function destroy(User $user) {
    	$user->delete();

        return redirect()->route('usuarios.index');
    }
}
