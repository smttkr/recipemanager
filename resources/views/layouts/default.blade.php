<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link
    href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />

  <style text="css">
    #app {
      min-height: 100vh;
      color: #43484d;
      background-color: #e4e7f5;
      font-family: "M PLUS Rounded 1c", sans-serif;
      font-family: "Noto Sans JP", sans-serif;
    }
  </style>
  @yield('style')
  <title>@yield('title')</title>
</head>

<body>
  <div id="app">
    <header-component></header-component>
    @yield('content')
  </div>
  <script src=" {{ mix('js/app.js') }} "></script>
  @yield('script')
</body>

</html>
