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
    <recipe-update-component v-if="editShow" key="edit" :recipe="{{ $recipe }}"></recipe-update-component>
    <recipe-detail-component v-else key="show" :recipe="{{ $recipe }}"></recipe-detail-component>
  </section>

  <section>
    <h1 class="hidden">COMMENT_&_BOOKMARK</h1>
    <icon-component v-on:edit="editShow=!editShow" v-on:post="postShow=true" v-on:bookmark="bookmarkSubmit"
      v-on:destroy="destroySubmit">
    </icon-component>

    @if ($comments !==[])
    <comment-component :comments="{{ $comments }}"></comment-component>
    @endif

  </section>
  <comment-post-component :post-show="postShow" :recipe-id="{{ $recipe_id }}" v-on:close="postShow = false">
  </comment-post-component>

  <form ref="bookmarkStore" action="{{ route('bookmarks.store') }}" method="POST" class="hidden">
    @csrf
    <input type="hidden" name="recipe_id" value="recipeId" />
    <button type="submit"></button>
  </form>

  <form ref="recipeDestroy" action="{{ route('recipes.destroy',$recipe->id) }}" method="POST" class="hidden">
    @csrf
    @method("DELETE")
    <button type="submit"></button>
  </form>
</main>
@endsection

@section("script")
<script>
  new Vue({
  el: "#app",
  data:{
    csrf: document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content"),
    postShow: false,
    editShow:false,
    editPoinst:"",
  },
  methods: {
    bookmarkSubmit(){
      this.$refs.bookmarkStore.submit();
    },
    destroySubmit(){
      this.$refs.recipeDestroy.submit();
    }
  },
  });
</script>
@endsection
