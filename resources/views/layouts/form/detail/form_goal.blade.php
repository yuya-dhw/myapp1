@extends('layouts.form')
@section('form_area')
<h2 class="form__title">アーティスト目標編集</h2>
@if ($errors->any())
        <div>
            <ul class="message__list">
                @foreach ($errors->all() as $error)
                    <li class="error__message">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="form__area_goal">
  <form action="/profile/edit/goal/post" method="POST">
  @csrf
  <textarea name="goal_body" id="goal_body" cols="30" rows="10">{{old('body', $goal->body)}}</textarea>
  <button type="submit" class="goal__submit_button">決定</button>
  </form>
</div>
@endsection