<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('logged-in')) {
            # code...
            dd('no access allowed');
        }

        $users = User::paginate(10);

        if (Gate::allows('is-admin')) {
            # code...
            return view('admin.users.index', ['users' => $users]);
        }
        
        // return view('admin.users.index', ['users' => $users]);
        dd('you need admin rights');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        /* $validated_data = $request->validated();

        // $user = User::create($request->except(['_token', 'roles']));
        $user = User::create($validated_data); */

        $new_user = new CreateNewUser();
        $user = $new_user->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        // use roles relationship to grab the roles array from the request
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', "User created successfully!");

        return redirect(route('admin.users.index'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', ['roles' => Role::all(), 'user' => User::find($id)]);
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

        if (!$user) {
            $request->session()->flash('error', 'You can not edit this user!');
            return redirect(route('admin.users.index'));
        }

        // don't pass in the roles since our db doesn't have it
        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles); //add roles to db

        $request->session()->flash('success', "User updated successfully!");

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('success', "User has been deleted successfully!");

        return redirect(route('admin.users.index'));
    }
}