@extends('layouts.form')
@section('form_area')
<h2 class="form__title">メンバー情報編集</h2>

<div class="form__area_member">
<div class="back__button_area">
  <a href="/profile" class="back__button_content">完了</a>
</div>
@if(DB::table('members')->where('global_id', Auth::id())->exists())
<h3 class="member__title_sub">現在のメンバー</h3>
<ul class="existing__member">
  @foreach($members as $member)
  <li class="member__card">
    <div class="member__edit_top">
      <div class="member_top">
      <h5 class="member_name">{{$member->name}}</h5>
      </div>
      <div class="member__interaction">
        <a href="{{route('member_rewrite',['id'=>$member->id])}}">編集</a>
        <form method="POST" action="{{route('member_delete',['id'=>$member->id])}}">
        @csrf
        <button type="submit">削除</button>
        </form>
      </div>
    </div>
    <h6 class="member_part">{{$member->part}}</h6>
    <h6 class="member_role">{{$member->role}}</h6>
  </li>
  @endforeach
</ul>
@endif


<form action="{{route('member_rewrite_post', ['id'=>$old_member->id])}}" method="POST">
  @csrf
  
<ul class="form__list_member">
<h3 class="member__title_sub">メンバー編集</h3>
  <li>
    <label for="member_name" class="form__label">メンバー名</label>
    <input type="text" id="member_name" name="member_name" value="{{$old_member->name}}">
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
    <input type="text" id="member_part" name="member_part" value="{{$old_member->part}}">
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
    <select id="member_role" name="member_role" value="{{$old_member->role}}">                          
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
    <input type="text" id="member_link" name="member_link" value="{{$old_member->link}}">
    @if($errors->has('member_link'))
        <ul class="message__list">
          <li class="error__message">
            {{$errors->first('member_link')}}
          </li>
        </ul>
    @enderror
  </li>
</ul>



<button type="submit" class="member__submit_button">完了</button>
</form>
</div>
@endsection