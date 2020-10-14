<?php

namespace App\Http\Controllers\BackEnd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BackEndController
{
    public function index()
    {
        $users = User::paginate(10);

        return view('back-end.users.index' , compact('users'));
    }// end of index function

    public function create()
    {
        return view('back-end.users.create');
    }// end of create function

    public function store(Request $request)
    {
    //   dd($request->all());
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        return redirect(route('users.index'));
    } // end of store function

    public function edit(User $user)
    {
        return view('back-end.users.edit' , compact('user'));
    }// end of edit function

    public function update(User $user, Request $request)
    {
        $requestArray = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->has('password') && $request->get('password') != "")
        {
            $requestArray += ['password' => Hash::make($request->password),];
        }
        $user->update($requestArray);

        return redirect(route('users.index'));

    }// end of update function

    public function destroy(User $user)
    {

        $user->delete();

        return redirect(route('users.index'));

    }// end of destroy function
}// end of controller
