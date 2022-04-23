<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pages.dashboard.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' =>  ['required', 'confirmed', Password::min(8)->mixedCase()
            ->numbers()
            ->symbols(),],
            'password_confirmation' => 'required|same:password',
        ]);

        User::create($validateData);
        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return view('pages.dashboard.user.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.dashboard.user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' =>  Hash::make(['required', 'confirmed', Password::min(8)->mixedCase()
            ->numbers()
            ->symbols(),]),
            'password_confirmation' => 'required|same:password',
        ]);

      $user->update($validateData);
      return redirect()->route('users.index',['user'=>$user->id])->with('pesan',"update data{$validateData['keterangan']} berhasil");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('pesan',"hapus data $user->email berhasil");
    }

    // public function reset(User $user)
    // {
    //     $user = User::where('id',$user->id)->first()->update(['password' => '123456789']);
    //     return "Berhasil di proses";

    //     //dump($document);
    // }
    public function reset(User $user)
    {
        $user = User::where('id',$user->id)->first()->update(['password' => \bcrypt('password')]);
        return "Berhasil di proses";

        dump($user);
    }
}
