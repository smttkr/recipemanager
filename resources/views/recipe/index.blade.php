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
        <news-component :news="{{ $news }}" v-on:topic-click="topicModalOpen"></news-component>
      </section>
    </div>
  </section>

  <section>
    <h1 class="hidden">CONTENTS</h1>
    <content-group-component :dishes="{{ $dishes }}" :category="category"></content-group-component>
  </section>

  <topic-modal-component :popup="popup" :modal-topic-content="modalTopicContent" v-on:close-modal="topicModalClose">
  </topic-modal-component>
</main>
@endsection

@section('script')
<script>
  new Vue({
  el: "#app",
  data: {
    category: "",
    popup: false,
    modalTopicContent: "",
  },
  methods: {
    clear() {
      this.category = "";
    },
    topicModalOpen(value) {
      this.modalTopicContent = value;
      this.popup = true;
    },
    topicModalClose() {
      this.popup = false;
      this.modalTopicContent = "";
    },
  },
});
</script>
{{-- <script src="{{ asset('js/recipe/recipe_index.js') }}"></script> --}}
@endsection
