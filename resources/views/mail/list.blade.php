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
    <li>
      <h3>{{$yourmail->sender}}</h3>
      <h4>{{$yourmail->title}}</h4>
      <p>{{$yourmail->content}}</p>
    </li>
    @endforeach
  @endisset
  </div>
  <div id="mymails" class="info__area mail__list_area">
  @isset($mymails)
    @foreach($mymails as $mymail)
    <li>
      <h3>{{$mymail->address}}</h3>
      <h4>{{$mymail->title}}</h4>
      <p>{{$mymail->content}}</p>
    </li>
    @endforeach
    @endisset
  </div>
  

  



@endsection