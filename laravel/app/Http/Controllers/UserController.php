<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name) {
        $user = User::where('name', $name)->first();

        $articles = Article::orderBy('id', 'desc')->where(['user_id' => $user->id]);
        $articles = $articles->paginate(5);

        return view('users.show', ['user' => $user, 'articles' => $articles]);
    }

    public function edit(string $name) {
        $user = User::where('name', $name)->first();

        if(auth()->id() !== $user->id) {
            return view('articles.index');
        }

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, string $name) {
        $user = User::where(['name' => $name])->first();

        if(auth()->id() !== $user->id) {
            return view('articles.index');
        }

        $user->description = $request->description;

        $user->save();

        return redirect()->route('users.show', ['name' => $name]);
    }
}
