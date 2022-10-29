@extends('layouts.share')
@section('form_area')
    <header class="auth__top">
        <img src="{{asset('storage/common/logo.png')}}" alt="logo" id="top__logo">
    </header>
    
    
    <div class="auth__content">
    <form  method="POST" action="{{ route('register')}}">
        @csrf
        <div>
            <input name="name" type="text" placeholder="ユーザ名" value="{{ old('name') }}" />
            @if($errors->has('name'))
            <ul class="message__list">
                <li class="error__message">
                    {{$errors->first('name')}}
                </li>
            </ul>
            @enderror
        </div>
        <div>   
        <input name="email" type="email" placeholder="メールアドレス" value="{{ old('email') }}"/>
        @if($errors->has('email'))
            <ul class="message__list">
                <li class="error__message">
                    {{$errors->first('email')}}
                </li>
            </ul>
            @enderror
        </div>
        <div>
            <input name="password" placeholder="パスワード" type="password"/>
            @if($errors->has('password'))
            <ul class="message__list">
                <li class="error__message">
                    {{$errors->first('password')}}
                </li>
            </ul>
            @enderror
        </div>
        <div>
            <input name="password_confirmation" placeholder="パスワード(確認用)" type="password"/>
        </div>
        <div class="submit__area">
            <button type="submit" class="auth__button">登録</button>
        </div>
    </form> 
    </div> 
    <p class="login__beacon">すでにアカウントをお持ちですか？<a href="/login">ログイン</a></p>
@endsection