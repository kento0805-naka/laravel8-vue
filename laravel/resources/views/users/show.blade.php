@extends('layouts.app')

@section('title', $user->name)

@section('content')
  <div class="container">
    @include('users.profile')
    @foreach($articles as $article)
      @include('articles.post')
    @endforeach
    <div class="d-flex justify-content-center">
      {{ $articles->links() }}
    </div>
  </div>
@endsection
