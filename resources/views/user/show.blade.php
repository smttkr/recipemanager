@extends('layouts.default')

@section('title')
{{ $user->name }}
@endsection

@section('content')
<main>
  <section>
    <img src="" alt="">
    <h1 class="hidden">MYSELF_SHOW</h1>
    <user-show-component :user="{{ $user }}" v-on:edit-click="editPop" v-on:delete-click="deletePop">
    </user-show-component>
  </section>

  <profile-edit-component :show="editShow" :which-show="whichShow" :csrf="csrf" :link="editLink" v-on:close="close">
  </profile-edit-component>
  <shop-user-delete-component :show="deleteShow" :csrf="csrf" :link="deleteLink" v-on:close="close">
  </shop-user-delete-component>
</main>

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
    deleteShow: false,
    deleteLink: "",
    editShow: false,
    editLink: "",
  },
  methods: {
    deletePop(value) {
      this.deleteShow = true;
      this.deleteLink = "/shopusers/" + value;
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
