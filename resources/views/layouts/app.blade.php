<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/sign_up.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sign_in.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/button.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card_edit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card_new.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card_show.css') }}" rel="stylesheet">
    <link href="{{ asset('css/list_new.css') }}" rel="stylesheet">
    <link href="{{ asset('css/list_edit.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
   @auth
<header class="header">
  <nav class="nav">
    <ul class="header_menu">
      <li class="nav-link">{{Auth::user()->name }}さん</li>
      <li class="header_menu_title">
          <a class="nav-link listNew" href="/"></a>
      </li>
      <li>
        <ul class="header_menu_inner">
          <li>
              <a class="nav-link listNew" href="{{ route('new') }}">リストを作成</a>　　
          </li>
          <li>
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                ログアウト
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
          </li>
        </ul>
      </li>
    </ul>
        <form  method ="GET" action="/" class="form-inline my-2 my-md-0">
					<input class="form-control mr-sm-2" type="text" name="keyword" placeholder="検索..." aria-label="検索...">
					<button class="btn btn-dark" type="検索">検索</button>
				</form>
  </nav>
</header>
@endauth
@yield('content')
</body>
</html>
