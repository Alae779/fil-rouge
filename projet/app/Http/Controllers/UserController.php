<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }
    public function ban($id){
        $user = User::findOrFail($id);
        $user->update(['is_banned' => 'banned']);
        return redirect()->back();
    }
    public function unban($id){
        $user = User::findOrFail($id);
        $user->update(['is_banned' => 'active']);
        return redirect()->back();
    }
}
