@extends("layouts.default")

@section("style")
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_show.css') }}">
@endsection

@section("title")
{{ $recipe_name }}
@endsection

@section("content")

<main class="show pb-5">
  <section>
    <h1 class="hidden">CONTENT_DETAIL</h1>
    <recipe-detail-component :recipe="{{ $recipe }}"></recipe-detail-component>
  </section>

  <section>
    <h1 class="hidden">ICON_MENU_&_COMMENTS</h1>
    <icon-component :csrf="csrf" :recipe-id="{{ $recipe_id }}" @can("isOwner") :is-owner="true" @endcan></icon-component>

    <comment-group-component :comments="{{ $comments }}" :user-id="{{ $user->id }}" :csrf="csrf">
    </comment-group-component>
  </section>
</main>
@endsection

@section("script")
<script>
  new Vue({
  el: "#app",
  data:{
    csrf: document
    .querySelector("meta[name='csrf-token']")
    .getAttribute("content"),
  },
  });
</script>
@endsection
