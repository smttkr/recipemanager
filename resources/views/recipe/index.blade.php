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
    <input type="text" class="form-control" placeholder="キーワードを入力">
    <div class="input-group-append">
      <button class="btn btn-outline-primary" type="button" id="button-addon2">検索</button>
    </div>
  </div>

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
    <news-modal-component :show="newsPop" :news="news" v-on:close="newsModalClose" v-on:delete="submitDeletion">
    </news-modal-component>
    <news-post-component :show="newsPostPop" :csrf="csrf" v-on:close="newsPostClose"></news-post-component>
  </section>
  <form :action="link" ref=newsDelete method="POST">
    @csrf
    @method("DELETE")
  </form>
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
    newsPop: false,
    newsPostPop:false,
    news:null,
    link:null,
  },
  computed: {
  },
  methods: {
    clear() {
      this.category = "";
    },
    newsModalOpen(value) {
      this.news = value;
      this.link = "news/"+value.id;
      this.newsPop = true;
    },
    newsModalClose() {
      this.newsPop = false;
      this.news = null;
      this.link = null;
    },
    newsPostOpen(){
      this.newsPostPop = true;
    },
    newsPostClose(){
      this.newsPostPop = false;
    },
    submitDeletion(){
      this.$refs.newsDelete.submit();
    }
  },
});
</script>
@endsection
