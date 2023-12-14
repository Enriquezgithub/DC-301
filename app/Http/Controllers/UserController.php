<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::orderBy('id')->get();
        return response()->json($users);
    }

    public function view(User $user) {
        $user->load('purchases');
        $user->load('sales');
        return response()->json($user);
    }

    //store
    public function store(Request $request){
        $fields = $request->validate([
            'name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|nullable',
            'email' =>  'string|required'
        ]);

        $user = User::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'A new user record has been created with an ID# of ' . $user->id
        ]);
    }

    //update
    public function update(Request $request, User $user){
        $fields = $request->validate([
            'name' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'email' =>  'string',
        ]);

        $user->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'User with ID # ' . $user->id . 'has been updated'
        ]);
    }

    //delete

    public function delete(User $user){
        $details = $user->last_name . ' , ' . $user->first_name;
        $user->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => "The user $details has been deleted."
        ]);
    }
}
