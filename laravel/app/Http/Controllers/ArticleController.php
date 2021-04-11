<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index() {
        $articles = Article::orderBy('id', 'desc');
        $articles = $articles->paginate(5);
        return view('articles.index', ['articles' => $articles]);
    }

    public function store(ArticleRequest $request, Article $article) {
        $article->body = $request->tweet;
        $article->user_id = $request->user()->id;
        $article->save();
    }

    public function destroy(Article $article) {
        $article->delete();
    }

    public function fetchAllArticles() {
        $articles = Article::orderBy('id', 'desc');
        $articles = $articles->paginate(5);
        foreach($articles as $article) {
            $article->user_name = $article->user->name;
        }
        return response()->json($articles);
    }
}
