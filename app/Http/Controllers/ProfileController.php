<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $users = $this->getAllUsers();
        return view('profile.edit', compact('users'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = $request->all();

        // dd($data['email']);

        $record = User::where('email', $data['email'])->get();
        // dd($record);
        $record->name = $request->edit_name;
        $record->is_admin = $request->edit_isAdmin;
        $record->password = $request->password;
        $record->save();
        
        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withMessage(__('User successfully updated.'));
    }

    public function create(Request $request)
    {
        // dd($request);
        $data = $request->all();
        // dd($request->password);
        $data['password'] = Hash::make($request->get($request->password));
        User::create($data);
        
        return back()->with('message', 'Success!');
    }

    protected function getAllUsers()
    {
        $users = User::all();
        return $users;
    }
}
