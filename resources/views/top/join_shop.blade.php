@extends('layouts.app')

@section('title')
RecipeManager
@endsection

@section('style')
{{-- <link rel="stylesheet" href="style.css"> --}}
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">お店に参加する</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
              <label for="shop_id" class="col-md-4 col-form-label text-md-right">ショップID</label>
              <div class="col-md-6">
                <input id="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id"
                  value="{{ old('shop_id') }}" required autocomplete="shop_id" autofocus>
                @error('shop_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  参加
                </button>
              </div>
            </>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@section('script')
{{-- <script src=""></script> --}}
@endsection

@endsection
