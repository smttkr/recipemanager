@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_show.css') }}">
@endsection

@section('title')
{{ $dish_name }}
@endsection

@section('content')
<main class="show pb-5">
  <section>
    <h1 class="hidden">CONTENT_DETAIL</h1>
    <content-detail-component :dish="{{ $dish }}"></content-detail-component>
  </section>

  <section>
    <h1 class="hidden">COMMENT_&_BOOKMARK</h1>
    <icon-component :dish-id="{{ $dish_id }}"></icon-component>
    <comment-component :comments="{{ $comments }}"></comment-component>
  </section>
</main>
@endsection

@section('script')
<script>
  new Vue({
  el: "#app",
  });
</script>
@endsection
