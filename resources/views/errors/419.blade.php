@extends('layouts.exception')
@section('error_area')
<div class="exception__general">
    <img src="{{asset('storage/common/logo_pink.png')}}" alt="logo">
  <p class="exception__text">ページの有効期限が切れました</p>
</div>
@endsection