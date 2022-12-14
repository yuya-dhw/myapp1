@extends('layouts.form')
@section('form_area')
<h2 class="form__title">「影響を受けた動画」情報編集</h2>

<div class="form__area_film">

<form action="/profile/edit/film/post" method="POST">
  @csrf
  
<ul class="form__list_film">
<h3 class="film__title_sub">動画の追加</h3>
  <li>
    <label for="film_name" class="form__label">動画の説明</label>
    <input type="text" id="film_name" name="film_name" value="{{$old_film->name}}">
    @if($errors->has('film_name'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('film_name')}}
          </li>
        </ul>
    @enderror
  </li>
  <li>
    <label for="film_link" class="form__label">YouTubeリンク</label>
    <input type="text" id="film_link" name="film_link" value="{{$old_film->link}}">
    @if($errors->has('film_link'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('film_link')}}
          </li>
        </ul>
    @enderror
  </li>
</ul>



<button type="submit" class="film__submit_button">追加</button>
</form>
</div>
@endsection