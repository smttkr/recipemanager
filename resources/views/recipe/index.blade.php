@extends('default.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe-index.css') }}">
@endsection

@section('title')
RecipeManager
@endsection

@section('content')
<main class="pb-5">
  <section>
    <h2 class="hidden">CATEGORY＆NEWS</h2>
    <div class="grid nav-news mt-5">
      <div class="nav">
        {{-- ↓ナビ --}}
        <nav-component :nav-items="navItems" v-model="category" v-on:select-out="clear"></nav-component>
        {{-- ↑ナビ --}}
      </div>
      <div class="news">
        {{-- ↓ニュース --}}
        <news-component :news="news" v-on:topic-click="topicModalOpen"></news-component>
        {{-- ↑ニュース --}}
      </div>
    </div>
  </section>
  <section>
    <h2 class="hidden">CONTENTS</h2>
    <div class="content-box mt-5">
      {{-- ↓ 料理 --}}
      <transition-group name="slide-x" tag="div" class="grid">
        <div class="dish" v-for="dish in result" :key="dish.id">
          <content-group-component :dish="dish"></content-group-component>
        </div>
      </transition-group>
      {{-- ↑料理   --}}
    </div>
  </section>
  <topic-modal-component :popup="popup" :modal-topic-content="modalTopicContent" v-on:close-modal="topicModalClose"></topic-modal-component>
</main>
@endsection

@section('script')
<script src="{{ asset('js/recipe-index.js') }}"></script>
@endsection
