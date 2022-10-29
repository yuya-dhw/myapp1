
@extends('layouts.exception')
@section('error_area')
<div class="exception__general">
    <img src="{{asset('storage/common/logo_pink.png')}}" alt="logo">
  <p class="exception__text">存在しないページ、あるいは準備中のページです</p>
</div>
@endsection

