@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_create.css') }}">
@endsection

@section('title')
料理新規登録
@endsection

@section('content')
<main>
  <form action="" class="mx-auto mt-3 pb-5">
    <div class="img-form form-group mx-auto">
      <label for="input-file">画像</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="input-file" />
        <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択してください</label>
      </div>
    </div>
    <div class="form-group title-form mx-auto">
      <label for="title">料理名</label>
      <input type="text" class="form-control" id="title" />
    </div>
    <div class="form-check-group mt-3">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="salad" checked />
        <label class="form-check-label" for="salad">サラダ</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="meat" />
        <label class="form-check-label" for="meat">お肉</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="fried" />
        <label class="form-check-label" for="fried">揚げ物</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="category" id="dessert" />
        <label class="form-check-label" for="dessert">デザート</label>
      </div>
    </div>
    <div class="form-group mt-3">
      <label for="content">内容</label>
      <textarea id="content" class="form-control" rows="10"></textarea>
    </div>
    <button type="submit" class="d-block mx-auto btn btn-danger">
      新規作成
    </button>
  </form>
</main>
@endsection

@section('script')
<script src="{{ asset('js/recipe/recipe_create.js') }}"></script>
@endsection
