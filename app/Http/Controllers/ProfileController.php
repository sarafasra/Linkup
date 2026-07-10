<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->latest()->get();

        return view('profile.show', compact('user', 'posts'));
    }

    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $user->headline = $request->headline;
        $user->company = $request->company;

        if ($request->hasFile('profile_photo')) {

            $image = $request->file('profile_photo');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $imageName);

            $user->image_url = $imageName;
        }

        $user->save();

        return redirect()
            ->route('profile.show', $user)
            ->with('success', 'Profil mis à jour.');
    }
}