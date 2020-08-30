@extends('layouts.default')

@section('style')
<link rel="stylesheet" href="{{ asset('css/recipe/recipe_create.css') }}">
@endsection

@section('title')
料理新規登録
@endsection

@section('content')
<main>


  <form enctype="multipart/form-data" action="{{ route('recipes.store') }}" method="POST" class="mx-auto mt-3 pb-5">
    @csrf
    <div class="img-form form-group mx-auto">
      <label for="input-file">画像</label>
      <div class="custom-file">
        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror"
          id="image" />
        <label v-if="file===null" class="custom-file-label" for="image" data-browse="参照">ファイルを選択</label>
        <label v-else class="custom-file-label" for="image" data-browse="参照">@{{ file }}</label>
        @error('image')
        <small class="text-danger" role="alert">{{ $message }}</small>
        @enderror
      </div>
    </div>
    <div class="form-group name-form mx-auto">
      <label for="name">料理名</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
        value="{{ old('name') }}" />
      @error('name')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group category-form mx-auto">
      <label for="category">カテゴリ</label>
      <select name="category" class="custom-select @error('category') is-invalid @enderror" id="category">
        <option value="" class="hidden">選択してください</option>
        <option value="salad">サラダ</option>
        <option value="meat">お肉</option>
        <option value="fried">揚げ物</option>
        <option value="dessert">デザート</option>
      </select>
      @error('category')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <div class="form-group description-form mt-3">
      <label for="description">内容</label>
      <textarea id="description" name="description" value="{{ old('description') }}"
        class="form-control @error('description') is-invalid @enderror" rows="10"></textarea>
      @error('description')
      <small class="text-danger" role="alert">{{ $message }}</small>
      @enderror
    </div>
    <button type="submit" class="d-block mx-auto btn btn-primary">
      新規作成
    </button>
  </form>
</main>
@endsection

@section('script')
<script>
  new Vue({
    el: "#app",
      data: {
      file: null,
    },
  });
</script>
@endsection
