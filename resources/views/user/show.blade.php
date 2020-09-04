@extends("layouts.app")

@section("style")
<link rel="stylesheet" href="{{ asset("/css/user/user_show.css") }}">
@endsection

@section("title")
{{ $user->name }}
@endsection


@section("header-link")
@if($user->shopUser)
<a class="navbar-brand" href="{{ route("recipes.index") }}">
  {{ $user->shopUser->shop->name }}へ
</a>
@else
<a class="navbar-brand" href="{{ url("/") }}">
  RecipeManager
</a>
@endif
@endsection


@section("content")
<main>
  <div class="user-box bg-light container">
    <div class="profile-box">
      <div class="image-box">
        <img v-on:click="edit('image')"
          src="{{ 'http://homestead.recipemanager.test/storage/images/profile_images/'.$user->profile_image }}"
          alt="" />
      </div>
      <div class="name-box">
        <p v-on:click="edit('name')" class="name">{{ $user->name }}</p>
      </div>
    </div>
    @if ($user->shopUser)
    <div class="row info-box bg-light">
      <div class="shop col-sm border">
        {{ $user->shopUser->shop->name }}
      </div>
      <div class="position col-sm border">
        {{ $user->shopUser->position }}
      </div>

      <div class="col-12">
        <button v-on:click="cofirmDeletion" type="button" class="btn btn-lg btn-outline-danger">
          退会する
        </button>
      </div>
    </div>
    @endif
  </div>
  <profile-edit-component :show="editShow" :user-id="{{ $user->id }}" :edit-type="editType" :csrf="csrf"
    v-on:close="close">
  </profile-edit-component>

  @if ($user->shopUser)
  <form ref="shopUserDeletion" action="{{ route("shopusers.destroy",$user->shopUser->id) }}" method="POST">
    @csrf
    @method("DELETE")
  </form>
  @endif
</main>


@endsection

@section("script")
<script>
  new Vue({
  el: "#app",
  data: {
    csrf: document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content"),
    editType: "",
    editShow: false,
  },
  methods: {
    edit(type){
      this.editShow = true;
      this.editType = type;
    },

    close() {
      this.editShow=false;
      this.editType=""
    },
    cofirmDeletion(){
      if((confirm("本当に退会しますか？")) === true){
      this.submitDeletion();
      }
    },
    submitDeletion(){
      this.$refs.shopUserDeletion.submit();
    },

  },
});
</script>
@endsection
