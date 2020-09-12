@extends("layouts.default")

@section("title")
{{ $recipe_name }}
@endsection

@section("content")

<main class="show mb-3">
  <section>
    <h1 class="hidden">CONTENT_DETAIL</h1>
    <recipe-detail-component :recipe="{{ $recipe }}"></recipe-detail-component>
  </section>

  <section>
    <h1 class="hidden">ICON_MENU_&_COMMENTS</h1>
    <icon-component :csrf="csrf" :recipe-id="{{ $recipe_id }}" @can("isOwner") :is-owner="true" @endcan
      @if($does_bookmark=$user->doesBookmark($recipe_id))
      :does-bookmark="{{ $does_bookmark }}" @endif
      v-on:post-show="togglePostShow"
      >
    </icon-component>

    <comment-group-component :comments="{{ $comments }}" :user-id="{{ $user->id }}" @can("isOwner") :is-owner="true"
      @endcan :csrf="csrf">
    </comment-group-component>
    <comment-post-component :show="postShow" :recipe-id="{{ $recipe_id }}" :csrf="csrf" v-on:close="postShow = false">
    </comment-post-component>
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
    postShow:false,
  },
  methods: {
    togglePostShow(){
      this.postShow =!this.postShow;
    }
  },
  });
</script>
@endsection
