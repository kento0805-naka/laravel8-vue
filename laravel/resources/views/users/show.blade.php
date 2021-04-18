@extends('layouts.app')

@section('title', $user->name)

@section('content')
  <div class="container">
    {{-- <div class="card mt-3 mb-4">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
              <i class="fas fa-user-circle fa-3x"></i>
            </a>
            <h2 class="h5 card-title m-0">
              <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                {{ $user->name }}
              </a>
            </h2>
          </div>
          @if (Auth::id() === $user->id)
            <a class="text-muted" href="{{ route('users.edit', ['name' => $user->name ]) }}">
              <button class="btn btn-sm btn-primary">自己紹介文を編集</button>
            </a>
          @endif
        </div>
      </div>
      <div class="card-body">
        <div class="card-text">{{ $user->description }}</div>
      </div>
    </div> --}}
    @include('users.profile')
    @foreach($articles as $article)
      @include('articles.post')
    @endforeach
    <div class="d-flex justify-content-center">
      {{ $articles->links() }}
    </div>
  </div>
@endsection
