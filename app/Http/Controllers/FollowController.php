<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggle(User $user)
    {
        $authUser = Auth::user();

        if ($authUser->id == $user->id) {
            return back();
        }

        if ($authUser->following()->where('following_id', $user->id)->exists()) {

            $authUser->following()->detach($user->id);

        } else {

            $authUser->following()->attach($user->id);

        }

        return back();
    }
}
