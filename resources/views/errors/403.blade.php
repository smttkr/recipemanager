@extends("layouts.app")

@section("style")

@endsection

@section("title")
403 エラー
@endsection


@section("header-link")
<a class="navbar-brand" href="{{ url("/") }}">
  RecipeManager
</a>
@endsection


@section("content")
<main>
  <div class="code">403</div>
  <div class="message">{{ $message }}</div>
  <div>
    <button type="button" onclick="history.back()" class="btn btn-lg btn-outline-success mt-3">戻る</button>
  </div>
</main>
@endsection
