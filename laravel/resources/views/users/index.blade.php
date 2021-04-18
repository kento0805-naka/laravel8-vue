@extends('layouts/app')

@section('title', 'ユーザー検索')

@section('content')
	<div class="container">
		<h3>ユーザーを探そう</h3>
		<form class="form-inline d-flex justify-content-center md-form form-sm">
			@csrf
			<input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
				aria-label="Search" name="keyword">
			<button class="btn btn-outline-primary btn-rounded btn-sm my-0" type="submit">検索</button>
		</form>
		
	<div class="row d-flex justify-content-center">
		@foreach ($users as $user)
			<div class="col-lg-3 col-sm-6 p-1 mb-2" style="max-width: 300px;">
					<div class="card testimonial-card" id="userbox">
                        <div class="mx-auto">
                            <a href="{{ route('users.show', ['name' => $user->name]) }}">
                                <div class="card-up indigo lighten-1"></div>
                                <div class="avatar mx-auto white mt-3">
                                    <i class="far fa-user text-muted fa-3x" id=user-icon></i>
                                </div>
                            </a>
                        </div>
						<div class="card-body">
                            <a href="{{ route('users.show', ['name' => $user->name]) }}">
                                <h4 class="card-title text-muted">{{ $user->name }}</h4>
                                <hr>
                                <p class="text-muted">投稿数: {{ $user->articles->count() }}ツイート</p>
                            </a>
                            @if(Auth::user()->isFollowing($user))
                                <follow-button
                                class="ml-auto"
                                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                                :authorized='@json(Auth::check())'
                                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                                >
                                </follow-button>
                            @elseif(Auth::id() === $user->id)
                                <p class="text-muted">マイページへ移動</p>
                            @else
                                <follow-button
                                class="ml-auto"
                                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                                :authorized='@json(Auth::check())'
                                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                                >
                                </follow-button>
                            @endif
						</div>
					</div>
				
			</div>
		@endforeach
	</div>
</div>
@endsection