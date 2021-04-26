<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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

    public function show(User $user, $id) {
        $user = User::findOrFail($id);
    	return view('usuarios.show', compact('user'));
    }

    public function edit(User $user, $id) {
        $user = User::findOrFail($id);
    	return view('usuarios.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user, $id) {
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
