@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_show.css') }}">
@endsection

@section('title')
料理名
@endsection

@section('content')
<main class="show pb-5">
  <div class="content-box mt-3 p-4 bg-light">
    <content-detail-component :dish="dish"></content-detail-component>
  </div>
  <div class="comment-box bg-white border-top">
    <comment-component :comments="comments"></comment-component>
  </div>
</main>
@endsection

@section('script')
<script src="{{ asset('js/recipe/recipe_show.js') }}"></script>
@endsection
