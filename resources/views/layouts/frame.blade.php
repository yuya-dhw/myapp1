<div class="general__header">
    <img src="{{asset('/storage/common/logo.png')}}" alt="logo">
    <a href="{{route('setting')}}"><img src="{{asset('/storage/common/setting.png')}}" alt="setting"></a>
</div>

<div class="contents-wrapper">
    <div class="column1">
      @yield('profile_image')
    </div>
    <div class="column2">
      @yield('profile_base')
    </div>
    <div class="column3">
      @yield('profile_song')
      @yield('profile_detail')
    </div>
  </div>
  <footer class="navigation">
    <ul class="navigation__area">
      <li class="navigation__icon">
        <a href="{{route('mail')}}"><img src="{{asset('/storage/common/mail.png')}}" alt="mail icon"></a>
      </li>
      <li class="navigation__icon">
        <a href="{{route('insight')}}"><img src="{{asset('/storage/common/insight.png')}}" alt="recommendation icon"></a>
      </li>
      <li class="navigation__icon">
        <a href="{{route('search')}}"><img src="{{asset('/storage/common/search.png')}}" alt="search icon"></a>
      </li>
      @auth
      <li class="navigation__icon">
        <a href="{{route('index')}}"><img src="{{asset($mypage)}}" alt="mypage icon" id="mypage"></a>
      </li>
      @endauth
      @if($mypage == 1)
      <li class="navigation__icon">
        <a href="{{route('register')}}"><img src="{{asset('/storage/common/register.png')}}" alt="registration icon"></a>
      </li>
      @endif
    </ul>
  </footer>
