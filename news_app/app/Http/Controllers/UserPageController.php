<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPageController extends Controller
{
    public function show($name)
    {
        $user = User::where('display_name', $name)->first();

        if (!$user) {
            return abort(404);
        }

        return view('user_page', [
            'user' => $user,
        ]);
    }
}
