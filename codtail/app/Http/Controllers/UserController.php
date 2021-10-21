<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,
        [
            'name' => 'required',
            'nickname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'nickname.required' => 'Nickname is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        return User::create([
            'name' => $request['name'],
            'nickname' => $request['nickname'],
            'email' => $request['email'],
            'password' => \Hash::make($request['password']),
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name' => 'required',
            'nickname' => 'required',
            'email' => 'required',
            'admin' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'nickname.required' => 'Nickname is required',
            'email.required' => 'Email is required',
            'admin.required' => 'Admin is required',
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return User::latest()->get();
    }
}