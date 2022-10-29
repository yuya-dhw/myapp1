@extends('layouts.form')
@section('form_area')
<h2 class="form__title">基本情報編集</h2>
<div class="form__area_base">
<form action="/profile/edit/base/post" method="POST">
  @csrf
  <ul class="form__list_base">
    <li>
      <label for="project_name" class="form__label">プロジェクト名</label>
      <input type="text" name="project_name" id="project_name" value="{{old('project_name',$base_value->project_name)}}">
      @if($errors->has('project_name'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('project_name')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="copy" class="form__label">キャッチフレーズ</label>
      <input type="text" name="copy" id="copy" value="{{old('copy',$base_value->copy)}}">
      @if($errors->has('copy'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('copy')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="genre" class="form__label">ジャンル</label>
      <select name="genre" id="genre" value="{{old('genre',$base_value->genre)}}">
        @foreach(config('genre') as $key =>$value)
          <option value="{{$value}}">{{$value}}</option>
        @endforeach
      </select>
      @if($errors->has('genre'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('genre')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="type" class="form__label">活動形態</label>
      <select name="type" id="type">
        @foreach(config('type') as $key =>$value)
          <option value="{{$value}}">{{$value}}</option>
        @endforeach
      </select>
      @if($errors->has('type'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('type')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="place" class="form__label">活動地域</label>
      <select name="place" id="place">
        @foreach(config('pref') as $key =>$value)
          <option value="{{$value}}">{{$value}}</option>
        @endforeach
      </select>
      @if($errors->has('place'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('place')}}
          </li>
        </ul>
      @enderror
    </li>
   
    <li>
    <h4 class="form__label_big">リリース情報</h4>
     
      <h4 class="form__label">リリースの有無</h4>
      <div class="radio__area">
        @if($base_value->release_exist == 0)
        <input type="radio" name="release_exist" id="release_exist_no" value="0" checked>
        <label for="release_exist_no" class="form__option">なし</label>
        
        <input type="radio" name="release_exist" id="release_exist_yes" value="1">
        <label for="release_exist_yes" class="form__option form__option_right">あり</label>
        @else
        <input type="radio" name="release_exist" id="release_exist_no" value="0" >
        <label for="release_exist_no" class="form__option">なし</label>
        
        <input type="radio" name="release_exist" id="release_exist_yes" value="1" checked>
        <label for="release_exist_yes" class="form__option form__option_right">あり</label>
        @endif
      </div>
      @if($errors->has('release_exist'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_exist')}}
          </li>
        </ul>
      @enderror
    </li>
    @empty($release_date)
    <li>
      <label for="release_date" class="form__label">リリース日</label>
      <input type="date" name="release_date" id="release_date" value="{{old('release_date')}}">
      @if($errors->has('release_date'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_date')}}
          </li>
        </ul>
      @enderror
    </li>
    @endempty
    @isset($release_date)
    <li>
      <label for="release_date" class="form__label">リリース日</label>
      <input type="date" name="release_date" id="release_date" value="{{old('release_date', $release_date)}}">
      @if($errors->has('release_date'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_date')}}
          </li>
        </ul>
      @enderror
    </li>
    @endisset
    <li>
      <label for="release_type" class="form__label">リリース形式</label>
      <select name="release_type" id="release_type">
        @foreach(config('release_type') as $key =>$value)
          <option value="{{$value}}">{{$value}}</option>
        @endforeach
      </select>
      @if($errors->has('release_type'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_type')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="release_name" class="form__label">作品名</label>
      <input type="text" name="release_name" id="release_name" value="{{old('release_name',$base_value->release_name)}}">
      @if($errors->has('release_name'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_name')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="release_link" class="form__label">配信サイトのリンク</label>
      <input type="text" name="release_link" id="release_link" value="{{old('release_link',$base_value->release_link)}}">
      @if($errors->has('release_link'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_link')}}
          </li>
        </ul>
      @enderror
    </li>
    <h4 class="form__label_big">イベント情報</h4>
    <li>
      <h4 class="form__label">イベントの有無</h4>
      <div class="radio__area">
        @if($base_value->event_exist == 0)
        <input type="radio" name="event_exist" id="event_exist_no" value="0" checked>
        <label for="event_exist_no" class="form__option">なし</label>
        
        <input type="radio" name="event_exist" id="event_exist_yes" value="1">
        <label for="event_exist_yes" class="form__option form__option_right">あり</label>
        @else
        <input type="radio" name="event_exist" id="event_exist_no" value="0" >
        <label for="event_exist_no" class="form__option">なし</label>
        
        <input type="radio" name="event_exist" id="event_exist_yes" value="1">
        <label for="event_exist_yes" class="form__option form__option_right" checked>あり</label>
        @endif
      </div>
      @if($errors->has('event_exist'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('event_exist')}}
          </li>
        </ul>
      @enderror
    </li>
    @empty($event_date)
    <li>
      <label for="event_date" class="form__label">イベント日</label>
      <input type="date" name="event_date" id="event_date"  value="{{old('event_date')}}">
      @if($errors->has('event_date'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('event_date')}}
          </li>
        </ul>
      @enderror
    </li>
    @endempty
    @isset($event_date)
    <li>
      <label for="event_date" class="form__label">イベント日</label>
      <input type="date" name="event_date" id="event_date"  value="{{old('event_date',$event_date)}}">
      @if($errors->has('event_date'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('event_date')}}
          </li>
        </ul>
      @enderror
    </li>
    @endisset
    <li>
      <label for="event_pref" class="form__label">都道府県</label>
      <select name="event_pref" id="event_pref">
        @foreach(config('pref') as $key =>$value)
          <option value="{{$value}}">{{$value}}</option>
        @endforeach
      </select>
      @if($errors->has('release_pref'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_pref')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="event_place" class="form__label">会場名</label>
      <input type="text" name="event_place" id="event_place" value="{{old('event_place',$base_value->event_place)}}">
      @if($errors->has('event_place'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('event_place')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="event_name" class="form__label">イベント名</label>
      <input type="text" name="event_name" id="event_name" value="{{old('event_name',$base_value->event_name)}}">
      @if($errors->has('event_name'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('event_name')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="event_link" class="form__label">イベントの外部サイトリンク</label>
      <input type="text" name="release_link" id="release_link" value="{{old('release_link',$base_value->release_link)}}">
      @if($errors->has('release_link'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_link')}}
          </li>
        </ul>
      @enderror
    </li>
    <li>
      <label for="event_link_com" class="form__label">イベントのcomusionリンク</label>
      <input type="text" name="release_link_com" id="release_link" value="{{old('release_link_com',$base_value->release_link_com)}}">
      @if($errors->has('release_link_com'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('release_link_com')}}
          </li>
        </ul>
      @enderror
    </li>
  </ul>
 <button type="submit" class="base__submit_button">決定</button>
</form>
</div>
@endsection