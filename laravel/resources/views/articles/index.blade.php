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
      <v-pagination dark :length="{{ $articles->count() }}" :total-visible="10"></v-pagination>
   @endguest
 @endsection
