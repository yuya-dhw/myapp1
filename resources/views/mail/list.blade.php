@extends('layouts.form')
@section('form_area')

<ul class="tab mail__tab">
  <li>
    <a href="#yourmails"><i class="fa-solid fa-inbox"></i></a>
  </li>
  <li>
    <a href="#mymails"><i class="fa-solid fa-paper-plane"></i></a>
  </li>
  </ul>
  <div id="yourmails" class="info__area mail__list_area">
    @isset($yourmails)
    @foreach($yourmails as $yourmail)
    <li class="mail__card">
      <form method="POST" action="{{route('mail_read', ['id'=>$yourmail->id])}}">
        @csrf 
        <input type="hidden" name="read" value=1> 
          <button type="submit">
            <h3>{{$yourmail->sender}}</h3>
            <h4>{{$yourmail->title}}</h4>
            <p>{{$yourmail->content}}</p>
          </button>
      </form>
      @if($yourmail->read == 0)
        <i class="new__badge"></i>
      @endif
    </li>
    @endforeach
  @endisset
  </div>
  <div id="mymails" class="info__area mail__list_area">
  @isset($mymails)
    @foreach($mymails as $mymail)
    <li>
      <a href="{{route('mail_check', ['id'=>$mymail->id])}}">
      <h3>{{$mymail->address}}</h3>
      <h4>{{$mymail->title}}</h4>
      <p>{{$mymail->content}}</p>
      @if($mymail->read == 1)
        <div class="read__badge">既読</div>
      @endif
      </a>
    </li>
    @endforeach
    @endisset
  </div>
  

  



@endsection