@extends('layouts.form')
@section('form_area')
<div class="form__area_setting">
@if(Auth::check())
<form action="{{route('logout')}}" method="POST">
  @csrf
  <button type="submit" class="danger__submit_button">ログオフ</button>
</form>
@endif
</div>
@endsection