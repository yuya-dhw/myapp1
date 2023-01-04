@extends('layouts.form')
@section('form_area')
<div class="form__area_member">

<form action="{{route('member_create')}}" method="POST">
  @csrf
  
<ul class="form__list_member">
<h3 class="member__title_sub">メンバー追加</h3>
  <li>
    <label for="member_name" class="form__label">メンバー名</label>
    <input type="text" id="member_name" name="member_name">
    @if($errors->has('member_name'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('member_name')}}
          </li>
        </ul>
    @enderror
  </li>
  <li>
    <label for="member_part" class="form__label">パート</label>
    <input type="text" id="member_part" name="member_part">
    @if($errors->has('member_part'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('member_part')}}
          </li>
        </ul>
    @enderror
  </li>
  <li>
    <label for="member_role" class="form__label">役職</label>
    <select id="member_role" name="member_role">                          
    @foreach(config('role') as $key => $value)
        <option value="{{ $value }}">{{ $value }}</option>
    @endforeach
    </select>
    @if($errors->has('member_role'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('member_role')}}
          </li>
        </ul>
    @enderror
  </li>
  <li>
    <label for="member_link" class="form__label">SNSリンク</label>
    <input type="text" id="member_link" name="member_link">
    @if($errors->has('member_link'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('member_link')}}
          </li>
        </ul>
    @enderror
  </li>
</ul>
<button type="submit" class="member__submit_button">追加</button>
</form>
</div>
@endsection