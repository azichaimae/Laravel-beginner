<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function User()
    {
        $user = User::paginate();
        return view('users.index',compact('user'));
    }
    // public function show(User $usert)
    // {
    //     //traitement de $user
    //     return view("users.show", compact('user'));
    // }


    public function store(Request $request)
    {

    //traitement d'ajout
        $validatedData = $request->validate([
            'name'=> 'required|max:255',
            'email'=>'required',
        ]);
        $user = new user;
        $user->name=$validatedData['name'];
        $user->username=$validatedData['username'];
        $user->save();
        return redirect("/users");
    }

    public function editUser($id)
    {
        $user = user::find($id);
        return view("users.editUser",compact('user'));
    }

    public function updateUser(Request $request,$id)
    {
        $user = new user;
        $user->name=$validatedData['name'];
        $user->username=$validatedData['username'];
        $user->save();
        return redirect("/users");
    }


    public function delete($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect("/users");
    }


}

