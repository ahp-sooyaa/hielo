<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    public function update(User $user)
    {
        $validated = request()->validate([
            'password' => 'sometimes|required|string|min:8|confirmed'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        return redirect($user->path())->withSuccess('status', 'Successfully Password Changed');
    }
}
