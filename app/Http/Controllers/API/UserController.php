<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('roles')->get()->map(function ($user) {
        $user->isOnline = $user->isOnline();
        return $user;});
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:60',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:6',
            'nik' => 'required|string|size:16|unique:users',
            'roleId' => 'required'
        ]);

        $role = Role::where('id', $request['roleId'])->first();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'nik' => $request['nik'],
        ]);
        
        $user->roles()->attach($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->sync($request->roleId);

        $this->validate($request,[
            'name' => 'required|string|max:60',
            'email' => 'required|string|email|max:60|unique:users,email,'.$user->id,
            'nik' => 'required|string|size:16|unique:users,nik'.$user->id,
            'roleId' => 'sometimes'
        ]);

        // update user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->save($request->all());

        return ['message', "User Updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->sync([]);
        // delete user

        $user->delete();

        return ['message', "User Deleted"];
    }
}
