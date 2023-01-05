@extends('layouts.form')
@section('form_area')
<div class="mail__edit_erea">
<form method="POST" action="{{route('mail_post',['name'=>$mail->sender])}}">
  @csrf
<input type="hidden" name="sender" value="{{$mail->address}}">
<input type="hidden" name="address" value="{{$mail->sender}}">
<div class="sender__area"><h3><span class="mail__guide">from&#058;</span>{{$mail->address}}</h3></div>
<div class="address__area">
  <h3><span class="mail__guide">to&#058;</span>{{$mail->sender}}</h3>
  <a href="" class="address__button"><i class="fa-solid fa-list-ul"></i></a>
</div>
<div class="label__area">
  <div class="mail__title_area"><span class="mail__guide">title&#058;</span><input type="text" name="mail_title" id="mail_title" readonly="readonly" value="Re&#058;{{$mail->title}}"></div>
  @if($errors->has('mail_title'))
      <ul class="message__list">
        <li class="error__message">
          {{$errors->first('mail_title')}}
        </li>
      </ul>
    @enderror
</div>

<div class="mail__body_area">
  @if($errors->has('mail_body'))
    <ul class="message__list">
      <li class="error__message">
        {{$errors->first('mail_body')}}
      </li>
    </ul>
  @enderror
<textarea name="mail_body" id="mail_body" cols="30" rows="15" placeholder="本文を入力"></textarea>

<button type="submit" class="mail__send_button"><i class="fa-solid fa-reply"></i></button>
</div>
</form>
</div>
@endsection