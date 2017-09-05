<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Users as UsersResource;
use App\Http\Resources\UsersCollection;
use App\Rules\CpfValidation;

class UsersController extends Controller
{
    public function index()
    {
        $users = \App\User::all();
        $users = new UsersCollection($users);
        return $users;
    }

    public function view($id)
    {
        /*request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'cpf' => ['required', new CpfValidation]
        ]);*/

        $user = \App\User::find($id);
        $user = new UsersResource($user);
        return $user;
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'cpf' => ['required', new CpfValidation]
        ]);

        return 'completo';
    }
}
