@extends('layouts.form')
@section('form_area')
<h2 class="form__title">「影響を受けた動画」情報編集</h2>

<div class="form__area_film">
<div class="back__button_area">
  <a href="/profile" class="back__button_content">完了</a>
</div>
@if(DB::table('films')->where('global_id', Auth::id())->exists())
<h3 class="film__title_sub">現在の動画</h3>
<ul class="existing__film">
  @foreach($films as $film)
  <li class="film__card">
    <div class="film__edit_top">
      <div class="film_top">
      <h5 class="film__name">{{$film->name}}</h5>
      </div>
      <div class="film__interaction">
        <a href="{{route('film_rewrite',['id'=>$film->id])}}">編集</a>
        <form method="POST" action="{{route('film_delete',['id'=>$film->id])}}">
        @csrf
        <button type="submit">削除</button>
        </form>
      </div>
    </div>
    <iframe width="200" height="117" src="https://www.youtube.com/embed/{{str_replace('https://youtu.be/','',$film->link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="film__content"></iframe>
  </li>
  @endforeach
</ul>
@endif


<form action="/profile/edit/film/post" method="POST">
  @csrf
  
<ul class="form__list_film">
<h3 class="film__title_sub">動画の追加</h3>
  <li>
    <label for="film_name" class="form__label">動画の説明</label>
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
    <label for="film_link" class="form__label">YouTubeリンク</label>
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
</div>
@endsection