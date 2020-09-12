@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_index.css') }}">
@endsection

@section('title')
RecipeManager
@endsection

@section('content')
<main class="pt-3">
  <div class="search-box input-group mb-2">
    <input v-model.trim="keyword" type="text" class="form-control" placeholder="キーワードを入力して検索">
  </div>
  <section>
    <h1 class="hidden">CATEGORY_＆_NEWS</h1>
    <div class="grid nav-news mt-5">

      <section class="nav">
        <h2 class="hidden">CATEGORY</h2>
        <nav-component v-model="category" v-on:select-out="clearCategory"></nav-component>
      </section>

      <section class="news bg-light">
        <h2 class="hidden">NEWS</h2>
        <news-group-component :news="{{ $news }}" :csrf="csrf" @can("isOwner") :is-owner="true" @endcan>
        </news-group-component>
      </section>
    </div>
  </section>

  <section>
    <h1 class="hidden">CONTENTS</h1>
    <recipe-group-component ref="recipeGroup" :recipes="{{ $recipes }}" :category="category" :keyword="keyword">
    </recipe-group-component>
  </section>
</main>
@endsection

@section('script')
<script>
  new Vue({
  el: "#app",
  data: {
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
    category: "",
    keyword:"",
  },
  computed: {
  },
  methods: {
    clearCategory() {
      this.category = "";
      this.clearLoadNum();
    },
    clearLoadNum(){
        this.$refs.recipeGroup.resetLoadNum();
    },
  },
});
</script>
@endsection
