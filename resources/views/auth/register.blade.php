@extends('layouts.app')

@section('title')
新規登録
@endsection

@section('style')
{{-- <link rel="stylesheet" href="style.css"> --}}
@endsection


@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">新規登録</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            {{-- <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">形態</label>
              <div class="col-md-6 d-flex align-items-center row">
                <label for="owner" class="text-center mb-0 col-6">
                  <input type="radio" name="radio" id="owner" value="owner" v-model="radio" />オーナー</label>
                <label for="staff" class=" text-center mb-0 col-6">
                  <input type="radio" name="radio" id="staff" value="staff" v-model="radio" />スタッフ</label>
              </div>
            </div> --}}
            {{-- <span><strong>@{{ error. }}</strong></span> --}}

            {{-- <div class="form-group row">
              <label for="shop_id" class="col-md-4 col-form-label text-md-right">ショップID</label>
              <div class="col-md-6">
                <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror"
                  name="shop_id" value="{{ old('shop_id') }}" required autocomplete="shop_id" autofocus
                  :placeholder="shopMessage" />
              </div>
            </div> --}}
            {{-- <span><strong>@{{ error. }}</strong></span> --}}

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">ニックネーム</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                  value="{{ old('name') }}" required autocomplete="name" autofocus :placeholder="inputMessage">
              </div>
            </div>
            {{-- <span><strong>@{{ error. }}</strong></span> --}}

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" :placeholder="inputMessage">
              </div>
            </div>
            {{-- <span><strong>@{{ error. }}</strong></span> --}}

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="new-password" :placeholder="inputMessage">
              </div>
            </div>
            {{-- <span><strong>@{{ error. }}</strong></span> --}}

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード(確認)</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password" :placeholder="inputMessage">
              </div>
            </div>
            {{-- <span><strong>@{{ error. }}</strong></span> --}}

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  登録
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@section('script')
<script src="{{ asset('js/top/register.js') }}"></script>
@endsection

@endsection
