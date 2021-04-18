<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $keyword = $request->input('keyword');
        if($keyword != '') {
            $users = User::where('name', 'like', '%'.$keyword.'%')->orderBy('created_at','desc')->get();
        } else {
            $users = User::orderBy('created_at','desc')->get();
        }

        return view('users.index', compact('users'));
    }

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

    public function follow(Request $request, string $name) {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }
    
    public function unfollow(Request $request, string $name) {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
