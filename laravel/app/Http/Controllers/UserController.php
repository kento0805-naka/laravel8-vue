<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name) {
        $user = User::where('name', $name)->first();

        $articles = $user->articles->sortByDesc('created_at');

        return view('users.show', ['user' => $user, 'articles' => $articles]);
    }
}
