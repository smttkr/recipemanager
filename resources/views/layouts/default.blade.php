<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/default/default.css') }}">
  <link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  @yield('style')
  <title>@yield('title')</title>
</head>

<body>
  <div id="app">
    <header class="cf">
      <a href="">
        <h1 class="logo">RecipeManager</h1></a>
      <div class="user">
        <span>{{ $user->name }}</span>
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          ログアウト
        </a>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>

      <header-component></header-component>
    </header>

    @yield('content')
  </div>
  <script src=" {{ mix('js/app.js') }} "></script>
  @yield('script')
</body>

</html>
