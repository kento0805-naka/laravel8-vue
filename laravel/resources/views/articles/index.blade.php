@extends('layouts.app')
    
 @section('content')
   @auth
    <post-index-component 
      :user-name='@json(Auth::user())'
      >
    </post-index-component>
   @endauth
   @guest
      @foreach($articles as $article)
         @include('articles.post')
      @endforeach
      {{ $articles->links() }}
   @endguest
 @endsection
