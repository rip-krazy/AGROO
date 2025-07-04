<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = UserRole::cases();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:' . implode(',', UserRole::values()),
            'jabatan' => 'nullable|string|max:255',
        ]);

        // Jika role diubah menjadi karyawan, pastikan ada jabatan
        if ($validated['role'] === UserRole::KARYAWAN->value && empty($validated['jabatan'])) {
            return back()->withErrors(['jabatan' => 'Jabatan harus diisi untuk role karyawan']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }
}