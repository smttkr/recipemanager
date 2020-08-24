<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/top/welcome.css') }}">
  <title>RecipeManager</title>
</head>

<body>
  <div id="app">
    <header>
      <h2 class="hidden">AUTH</h2>
      @if (Route::has('login'))
      <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">ログイン</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">新規登録</a>
        @endif
        @endauth
      </div>
      @endif
    </header>
    <main>
      <section>
        <h2 class="hidden">TOP-IMAGE</h2>
        <div class="content">
          <div class="top-box">
            <div class="title">
              <h1 class="mb-4">Recipe&nbsp;Manager</h1>
              <ul>
                <li>お店のレシピをWeb上で管理しませんか？</li>
                <li>
                  Recipe
                  Managerは、お店のレシピをスタッフ全員で共有するためのサービスです。
                </li>
                <li></li>
              </ul>
            </div>
          </div>
      </section>

      <section>
        <h2 class="hidden">TOP-DETAILS</h2>
        <div class="detail">
          <div class="container">
            <welcome-points-component></welcome-points-component>
            <welcome-carousel-component :images="images"></welcome-carousel-component>
          </div>
        </div>
      </section>
      <div class="start-btn">
        <a href="{{ route('register') }}">
          <button class="btn">今すぐ始めてみる</button>
        </a>
      </div>
    </main>
    <footer>
      <small>Copyright © 2020 Takara Sumimoto All Rights Reserved.</small>
    </footer>
  </div>

  <script src=" {{ mix('js/app.js') }} "></script>
  <script src="{{ asset("js/top/welcome.js") }}">
  </script>
</body>

</html>
