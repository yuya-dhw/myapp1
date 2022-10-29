@extends('layouts.share')
@section('form_area')

<header class="auth__top">
    <img src="{{asset('storage/common/logo.png')}}" alt="logo" id="top__logo">
</header>
<div class="auth__content">
    <form  method="POST" action="/login">
        @csrf
        <div>
            <input name="email" type="email" value="{{old('email')}}" placeholder="メールアドレス"/>
            @if($errors->has('email'))
            <ul class="message__list">
                <li class="error__message">
                    {{$errors->first('email')}}
                </li>
            </ul>
            @enderror
        </div>
        <div>
            <input name="password" type="password" placeholder="パスワード"/>
            @if($errors->has('password'))
            <ul class="message__list">
                <li class="error__message">
                    {{$errors->first('password')}}
                </li>
            </ul>
            @enderror
        </div>
        <div class="submit__area">
            <button type="submit" class="auth__button">ログオン</button>
        </div>
    </form>
</div>
<p class="register__beacon">アカウントをお持ちでない方は<a href="/register">こちら</a></p>
</body>
@endsection