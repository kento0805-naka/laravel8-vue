@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center mt-5"><i class="fab fa-twitter mr-1"></i><a class="text-dark" href="/">いえぃったー</a></h1>
        <div class="card mt-3" style="border-radius: 10%; height: 400px;">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2" style="margin-bottom: 50px;">ログイン</h2>
            <div class="card-text">
              <form method="POST" action="{{ route('login') }}" style="margin-top: 30px;">
                @csrf
                <div class="md-form mb-4">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
                </div>

                <div class="md-form mb-4">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
 
                <input type="hidden" name="remember" id="remember" value="on">

                <button class="btn btn-block blue-gradient mb-2" style="margin-top: 65px;" type="submit">ログイン</button>

              </form>

              <div class="mt-4">
                <a href="{{ route('register') }}" class="card-text" style="text-decoration: underline;">ユーザー登録はこちら</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection