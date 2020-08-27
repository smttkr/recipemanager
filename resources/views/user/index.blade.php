@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user/user_index.css') }}">
@endsection

@section('title')
ユーザー一覧
@endsection

@section('content')
<main>
  <section>
    <h1 class="hidden">SHOP_USER_INDEX</h1>
    <div class="users-box bg-light mt-4">
      <user-list-component :shop-users="{{ $shop_users }}"></user-list-component>
    </div>
  </section>
</main>
@endsection

@section('script')
<script>
  new Vue({
    el:"#app",
  })
</script>
@endsection
