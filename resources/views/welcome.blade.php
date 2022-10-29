
@extends('layouts.share')
    @section('form_area')
        <div class="welcome__area">
        @if (Route::has('login'))
            <div class="general__header welcome__header">
                @auth
                    <a href="{{ url('/profile') }}" class="welcome__link">Home</a>
                @else
                    <a href="{{ route('login') }}" class="welcome__link">ログオン</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="welcome__link">新規登録</a>
                @endif
                @endauth
            </div>
    @endif
        <div class="welcome__contents_wrapper">
            <div class="welcome__contents">
                <img src="{{asset('storage/common/logo.png')}}" alt="logo">
                <h2 class="welcome__title">comusion アーティストのためのコンセプト設計・共有アプリ</h2>
            </div>
        </div>
    </div>
    @endsection


           