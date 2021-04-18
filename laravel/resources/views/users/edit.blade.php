@extends('layouts.app')

@section('title', $user->name)

@section('content')
  <div class="container">
    <v-card class="mx-auto mb-3" max-width="800">
      <v-card-text>
        <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}">
          @method('PUT')
          @csrf
          <v-textarea
            outlined
            name="description"
            label="自己紹介"
            rows="10"
            value="{{ $user->description }}"
          ></v-textarea>
          <button type="submit" class="btn btn-primary btn-block">更新する</button>
        </form>
      </v-card-text>
    </v-card>
  </div>
@endsection