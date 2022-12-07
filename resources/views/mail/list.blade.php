@extends('layouts.form')
@section('form_area')
@isset($yourmails)
@foreach($senders as $sender)
@endforeach
@else
<h2>メッセージはありません</h2>

@endisset
@endsection