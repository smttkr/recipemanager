@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_index.css') }}">
@endsection

@section('title')
RecipeManager
@endsection

@section('content')
<main class="pb-5">
  <section>
    <h1 class="hidden">CATEGORY_＆_NEWS</h1>
    <div class="grid nav-news mt-5">

      <section class="nav">
        <h2 class="hidden">CATEGORY</h2>
        <nav-component v-model="category" v-on:select-out="clear"></nav-component>
      </section>

      <section class="news">
        <h2 class="hidden">NEWS</h2>
        <news-group-component :news="{{ $news }}" v-on:news-click="newsModalOpen" v-on:news-post-click="newsPostOpen">
        </news-group-component>
      </section>
    </div>
  </section>

  <section>
    <h1 class="hidden">CONTENTS</h1>
    <recipe-group-component :recipes="{{ $recipes }}" :category="category"></recipe-group-component>
  </section>

  <section>
    <h1 class="hidden">POP_UP</h1>
    <news-modal-component :show="newsPop" :news-modal-content="newsModalContent" v-on:close-modal="newsModalClose">
    </news-modal-component>
    <news-post-component :show="newsPostPop" v-on:close-post="newsPostClose"></news-post-component>
  </section>
</main>
@endsection

@section('script')
<script>
  new Vue({
  el: "#app",
  data: {
    category: "",
    newsPop: false,
    newsPostPop:false,
    newsModalContent: "",
  },
  methods: {
    clear() {
      this.category = "";
    },
    newsModalOpen(value) {
      this.newsModalContent = value;
      this.newsPop = true;
    },
    newsModalClose() {
      this.newsPop = false;
      this.newsModalContent = "";
    },
    newsPostOpen(){
      this.newsPostPop = true;
    },
    newsPostClose(){
      this.newsPostPop = false;
    }
  },
});
</script>
@endsection
