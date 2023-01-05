@extends('layouts.form')
@section('form_area')
<div class="mail__edit_erea">
  <form method="POST" action="{{route('mail_post',['name'=>$mail->sender])}}">
    @csrf
    <div class="sender__area">
      <h3><span class="mail__guide">from&#058;</span>{{$mail->sender}}</h3>
    </div>
    <div class="address__area">
      <h3><span class="mail__guide">to&#058;</span>{{$mail->address}}</h3>
    </div>
    <div class="label__area">
      <div class="mail__title_area"><span class="mail__guide">title&#058;</span><input type="text" name="mail_title" id="mail_title" readonly="readonly" value="Re&#058;{{$mail->title}}"></div>
    </div>

    <div class="mail__body_area">

      <p>{{$mail->content}}</p>

      <a href="{{route('mail_reply', ['id' => $mail->id])}}" class="mail__send_button"><i class="fa-solid fa-reply"></i></a>
    </div>
  </form>
</div>
@endsection