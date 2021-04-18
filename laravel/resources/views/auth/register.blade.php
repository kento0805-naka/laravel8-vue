@extends('layouts.app')

@section('title', 'Signup')

@section('content')
  <div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center mt-5"><i class="fab fa-twitter mr-1"></i><a class="text-dark" href="/">いえぃったー</a></h1>
        <div class="card mt-3 mx-auto" style="border-radius: 10%; height: 600px; width: 650px;">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>
            <div class="card-text">
              <form method="POST" action="{{ route('register') }}" style="height: 400px;">
                @csrf
                <div class="md-form">
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="ユーザー名">
                  <small>英数字3〜16文字(登録後の変更はできません)</small>
                </div>
                <div class="md-form" style="margin-bottom: 10px">
                   <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" placeholder="メールアドレス">
                </div>
                <div class="md-form" style="margin-bottom: 10px">
                  <input class="form-control" type="password" id="password" name="password" required placeholder="パスワード">
                </div>
                <div class="md-form" style="margin-bottom: 60px">
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required placeholder="パスワード(確認)">
                </div>
                <button class="btn btn-block blue-gradient mt-2 mb-2" style="margin-top: 65px;" type="submit">ユーザー登録</button>
              </form>

              <div class="mt-4">
                <a href="{{ route('login') }}" class="card-text" style="text-decoration: underline;">ログインはこちら</a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection