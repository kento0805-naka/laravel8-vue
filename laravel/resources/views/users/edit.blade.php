@extends('layouts.app')

@section('title', $user->name)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            <div class="card-text">
              <form method="POST" action="{{ route('users.update', ['name' => $user->name]) }}">
                @method('PUT')
                @csrf
								<div class="form-group">
									<label></label>
									<textarea name="description" type="text" required class="form-control" rows="15" placeholder="自己紹介">{{ $user->description }}</textarea>
								</div>
                <button type="submit" class="btn btn-primary btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection