@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe-index.css') }}">
@endsection

@section('title')
RecipeManager
@endsection

@section('content')
<main class="pb-5">
  <section>
    <h1 class="hidden">CATEGORY＆NEWS</h1>
    <div class="grid nav-news mt-5">
      <section class="nav">
        <h2 class="hidden">CATEGORY</h2>
        {{-- ↓ナビ --}}
        <nav-component :nav-items="navItems" v-model="category" v-on:select-out="clear"></nav-component>
        {{-- ↑ナビ --}}
      </section>
      <section class="news">
        <h2 class="hidden">NEWS</h2>
        {{-- ↓ニュース --}}
        <news-component :news="news" v-on:topic-click="topicModalOpen"></news-component>
        {{-- ↑ニュース --}}
      </section>
    </div>
  </section>
  <section>
    <h1 class="hidden">CONTENTS</h1>
    {{-- ↓ 料理 --}}
    <div class="container content-box mt-5">
      <transition-group name="slide-x" tag="div" class="row">
        <div class="dish col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4" v-for="dish in result" :key="dish.id">
          <content-group-component :dish="dish"></content-group-component>
        </div>
      </transition-group>
    </div>
    {{-- ↑料理   --}}
  </section>
  <topic-modal-component :popup="popup" :modal-topic-content="modalTopicContent" v-on:close-modal="topicModalClose">
  </topic-modal-component>
</main>
@endsection

@section('script')
<script src="{{ asset('js/recipe/recipe-index.js') }}"></script>
@endsection
