@extends('layouts.app')

@section('title')
{{ $user->name }}
@endsection

@section('header-link')
@if($user->shopUser)
<a class="navbar-brand" href="{{ route('recipes.index') }}">
  {{ $user->shopUser->shop->name }}へ
</a>
@else
<a class="navbar-brand" href="{{ url('/') }}">
  RecipeManager
</a>
@endif
@endsection


@section('content')
<div>
  <div>
    <img src="" alt="">
    <user-show-component :user="{{ $user }}" v-on:edit-click="editPop" v-on:delete-click="deletePop">
    </user-show-component>
  </div>

  <profile-edit-component :show="editShow" :which-show="whichShow" :csrf="csrf" :link="editLink" v-on:close="close">
  </profile-edit-component>
  <shop-user-delete-component :show="deleteShow" :shop-name="shopName" :csrf="csrf" :link="deleteLink"
    v-on:close="close">
  </shop-user-delete-component>
</div>

@endsection

@section('script')
<script>
  function reset() {
  return {
    csrf: document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content"),
    whichShow: "",
    deleteShow: false,
    deleteLink: "",
    editShow: false,
    editLink: "",
  };
}

new Vue({
  el: "#app",
  data: {
    csrf: document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content"),
    whichShow: "",
    editShow: false,
    editLink: "",
    shopName:"",
    deleteShow: false,
    deleteLink: "",
  },
  computed:{
  //渡すデータはここでまとめてOjectにして渡す
  },
  methods: {
    deletePop(value) {
      this.deleteShow = true;
      this.deleteLink = "/shopusers/" + value.link;
      this.shopName = value.shopName;
    },
    close() {
      Object.assign(this.$data, reset());
    },
    editPop(value) {
      this.editShow = true;
      this.editLink = "/users/" + value.link;
      this.whichShow = value.which;
    },
  },
});
</script>
@endsection
