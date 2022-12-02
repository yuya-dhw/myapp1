@extends('layouts.form')
@section('form_area')
<h2 class="form__title">プロフィール情報編集</h2>
<ul class="form__navigation">
  <li>
    <a href="{{route('image_edit')}}"><i class="fa-solid fa-image"></i>プロフィール画像編集</a>
  </li>
  <li>
    <a href="{{route('base')}}"><i class="fa-solid fa-address-card"></i>基本情報編集</a>
  </li>
</ul>
@endsection