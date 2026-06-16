<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            compact('user')
        );
    }

    public function update(
        Request $request,
        User $user
    )
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()
            ->route('admin.users')
            ->with(
                'success',
                'User berhasil diperbarui'
            );
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()
            ->with(
                'success',
                'User berhasil dihapus'
            );
    }
}