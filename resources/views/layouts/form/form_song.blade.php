@extends('layouts.form')
@section('form_area')
<h2 class="form__title">楽曲情報編集</h2>
<form action="{{route('song_post')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form__area_image">
    <div id="drop-zone" class="drop-zone__song">
        <p class="file__orientation">ここにファイルをドロップ<br>もしくは</p>
        <label for="song" class="file__button">
          ファイルを選択
          <input type="file" name="song" id="input-file" accept="audio/*">
        </label>
  </div>
  @if($errors->has('song'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('song')}}
          </li>
        </ul>
      @enderror
  <ul class="form__list_song">
    <li>
      <label for="song_name" class="form__label">曲名</label>
      @isset($song->name)
      <input type="text" name="song_name" id="song_name" value="{{old('song_name'), $song->name}}">
      @else
      <input type="text" name="song_name" id="song_name" value="{{old('song_name')}}">
      @endisset
      @if($errors->has('song_name'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('song_name')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="song_description" class="form__label">楽曲の説明</label>
      @isset($song->description)
      <input type="text" name="song_description" id="song_description" value="{{old('song_desc'), $song->description}}">
      @else
      <input type="text" name="song_description" id="song_description" value="{{old('song_desc')}}">
      @endisset
      @if($errors->has('song_description'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('song_description')}}
          </li>
        </ul>
      @enderror
    </li>
  </ul>
    <input type="submit" class="song__submit_button">
   
  </div>
    
</form>
@isset($song->path)
<form method="POST" action="{{route('song_delete')}}" class="song__delete">
  @csrf
  <input type="submit" class="danger__link" value="現在の楽曲を削除">
</form>
@endisset
@endsection