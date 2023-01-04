@extends('layouts.form')
@section('form_area')
<form action="{{route('film_create')}}" method="POST">
  @csrf
  
<ul class="form__list_film">
<h3 class="film__title_sub">動画の追加</h3>
  <li>
    <label for="film_name" class="form__label">動画の説明<span class="required__badge">必須</span></label>
    <input type="text" id="film_name" name="film_name">
    @if($errors->has('film_name'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('film_name')}}
          </li>
        </ul>
    @enderror
  </li>
  <li>
    <label for="film_link" class="form__label">YouTubeリンク<span class="required__badge">必須</span></label>
    <input type="text" id="film_link" name="film_link">
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
@endsection