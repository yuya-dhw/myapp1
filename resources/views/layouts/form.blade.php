<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
<meta name="twitter:card" content="summary"></meta>
<meta property="og:title" content="comusion The Concept Architecture for Independent Artist"></meta>
<meta property="og:image" content="{{asset('/storage/common/top.png')}}"></meta>
<meta property="og:description" content="アーティストのためのコンセプト設計・共有アプリ"></meta>

@if(Request::routeIs('search','search_result'))
<title>アーティスト検索</title>
@elseif(Request::routeIs('mail'))
<title>メールボックス</title>
@elseif(Request::routeIs('nail_check'))
<title>{{$name}}さんとの通信履歴</title>
@elseif(Request::routeIs('mail_edit'))
<title>メール作成</title>
@else
<title>プロフィール編集</title>
@endif
<!--ファビコンとapple touch iconを設定する-->
<link rel="stylesheet" href="{{asset('/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('/css/app.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal-default-theme.min.css">
<link rel="icon" href="{{asset('/storage/common/favicon.ico')}}">
<link rel="apple-touch-icon" href="{{asset('/storage/common/apple-touch-icon.png')}}">
</head>
<body>
  <header class="general__header">
    <img src="{{asset('/storage/common/logo.png')}}" alt="logo">
    <a href="{{route('setting')}}"><i class="fa-solid fa-gear general__header_icon"></i></a>
  </header>
  <div class="form__wrapper">
    @yield('form_area')
  </div>
  <footer class="navigation">
    <ul class="navigation__area">
      <li class="navigation__icon">
        <a href="{{route('mail')}}"><i class="fa-solid fa-envelope"></i></a>
      </li>
      <li class="navigation__icon">
        <a href="{{route('insight')}}"><i class="fa-solid fa-earth-asia"></i></a>
      </li>
      <li class="navigation__icon">
        <a href="{{route('search')}}"><i class="fa-solid fa-magnifying-glass"></i></a>
      </li>
      
      <li class="navigation__icon">
        <a href="{{route('index')}}"><i class="fa-solid fa-user"></i></a>
      </li>
      
    </ul>
  </footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.js"></script>
<script src="https://kit.fontawesome.com/3027a76dab.js" crossorigin="anonymous"></script>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>