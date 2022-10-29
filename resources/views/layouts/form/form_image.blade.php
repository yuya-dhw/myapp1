@extends('layouts.form')
@section('form_area')
<h2 class="form__title">プロフィール画像編集</h2>
<form action="/profile/edit/image/post" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form__area_image">
  
  
    <div id="drop-zone">
    <div id="preview">
  <h4>プレビュー</h4>
  @if($errors->has('profile_image'))
    <ul class="message__list">
      <li class="error__message">
         {{$errors->first('profile_image')}}
      </li>
    </ul>
  @enderror
  </div>
        <p class="file__orientation">ここにファイルをドロップ<br>もしくは</p>
        <label for="input-file" class="file__button">
          画像を選択
        <input type="file" name="profile_image" id="input-file">
        </label>
    </div>
    <input type="submit" class="image__submit_button">
  </div>
    
</form>
@endsection