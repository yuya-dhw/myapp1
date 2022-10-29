<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
<meta name="twitter:card" content="summary"></meta>
<meta property="og:title" content="comusion The Concept Architecture for Independent Artist"></meta>
<meta property="og:image" content="{{asset('/storage/common/top.png')}}"></meta>
<meta property="og:description" content="アーティストのためのコンセプト設計・共有アプリ">
<title>start comusion</title>
<!--ファビコンとapple touch iconを設定する-->
<link rel="stylesheet" href="{{asset('/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('/css/app.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal-default-theme.min.css">
<link rel="icon" href="{{asset('/storage/common/favicon.ico')}}">
<link rel="apple-touch-icon" href="{{asset('/storage/common/apple-touch-icon.png')}}">
</head>
<body>
  <div class="auth__area">
    @yield('form_area')
  </div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.0.5/remodal.min.js"></script>
<script src="{{asset('/js/app.js')}}"></script>
</body>
</html>