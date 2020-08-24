@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user/user_index.css') }}">
@endsection

@section('title')
ユーザー一覧
@endsection

@section('content')
<main>
  <div class="user-box bg-light mt-4">
    <user-list-component :users="users"></user-list-component>
  </div>
</main>
@endsection

@section('script')
<script src="{{ asset('js/user/user_index.js') }}"></script>
@endsection
