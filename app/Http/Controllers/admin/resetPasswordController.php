<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class resetPasswordController extends Controller
{
    public function reset(User $user)
    {
        $user = User::where('id',$user->id)->first()->update(['password' => \bcrypt('N@ruto12')]);
        return redirect()->route('users.index');


    }
}
