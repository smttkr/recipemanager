@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_show.css') }}">
@endsection

@section('title')
{{ $recipe_name }}
@endsection

@section('content')

<main class="show pb-5">
  <section>
    <h1 class="hidden">CONTENT_DETAIL</h1>
    <recipe-detail-component :recipe="{{ $recipe }}">
    </recipe-detail-component>
  </section>

  <section>
    <h1 class="hidden">COMMENT_&_BOOKMARK</h1>
    <icon-component :recipe-id="{{ $recipe_id }}"></icon-component>
    @if ($comments !==[])
    <comment-component :comments="{{ $comments }}"></comment-component>
    @endif
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
