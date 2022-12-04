@extends('layouts.form')
@section('form_area')
<h2 class="form__title">プロフィール情報編集</h2>
<ul class="form__navigation">
  <li>
    <a href="{{route('image_edit')}}"><i class="fa-solid fa-image"></i>プロフィール画像</a>
  </li>
  <li>
    <a href="{{route('base')}}"><i class="fa-solid fa-address-card"></i>基本情報</a>
  </li>
  <li>
    <a href="{{route('song_edit')}}"><i class="fa-solid fa-music"></i>楽曲情報</a>
  </li>
  <li>
    <a href="{{route('goal_edit')}}"><i class="fa-solid fa-compass"></i>目標</a>
  </li>
  <li>
    <a href="{{route('member_edit')}}"><i class="fa-solid fa-user-plus"></i>メンバー情報</a>
  </li>
  <li>
    <a href="{{route('film_edit')}}"><i class="fa-brands fa-youtube"></i>動画情報</a>
  </li>
  </ul>
@endsection