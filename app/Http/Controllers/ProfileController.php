<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('main/profile', [
            "title" => "Profil",
            "user" => $user,
            "achievement" => $user->achievement,
            "learning" => $user->learning->where('status', 1),
            "challenge" => $user->challengeTaken->where('status', 2)
        ]);
    }


    public function edit()
    {
        $user = Auth::user();
        return view('main/edit_profile', [
            "title" => "Profil",
            "user" => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/profile'), $imageName);
            $user->image = '/assets/profile/'.$imageName;
        }

        $user->name = $request->name;
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function editPassword()
    {
        $user = Auth::user();
        return view('main/edit_password', [
            "title" => "Profil",
            "user" => $user
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password updated successfully.');
    }
}
