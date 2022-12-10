<div class="general__header">
    @if($user->id == Auth::id())
    <a href="{{route('edit')}}" id="edit__button_entrance" class="edit__button">編集</a>
    @else
    <a href="{{route('mail_edit',['name' => $user->name])}}" class="direct__button"><i class="fa-solid fa-paper-plane general__header_icon"></i></i></a>
    @endif
    <img src="{{asset('/storage/common/logo.png')}}" alt="logo">
    <a href="{{route('setting')}}"><i class="fa-solid fa-gear general__header_icon"></i></a>
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
        <a href="{{route('mail')}}"><i class="fa-solid fa-envelope"></i></a>
      </li>
      <li class="navigation__icon">
        <a href="{{route('insight')}}"><i class="fa-solid fa-earth-asia"></i></a>
      </li>
      <li class="navigation__icon">
        <a href="{{route('search')}}"><i class="fa-solid fa-magnifying-glass"></i></a>
      </li>
      @auth
      <li class="navigation__icon">
        <a href="{{route('index')}}"><i class="fa-solid fa-user"></i></a>
      </li>
      @endauth
      @guest
      <li class="navigation__icon">
        <a href="{{route('register')}}"><i class="fa-solid fa-user"></i></a>
      </li>
      @endguest
    </ul>
  </footer>
