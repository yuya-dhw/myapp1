@extends('layouts.form')
@section('form_area')

<div class="form__area_film">
<a href="{{route('film_add')}}" class="member__add_button"><i class="fa-solid fa-circle-plus"></i>動画を追加</a>

@if(DB::table('films')->where('global_id', Auth::id())->exists())

<ul class="existing__film">
  @foreach($films as $film)
  <li class="film__card">
    <div class="film__edit_top">
      <div class="film_top">
      <h5 class="film__name">{{$film->name}}</h5>
      </div>
      <div class="film__interaction">
        <a href="{{route('film_rewrite',['id'=>$film->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
        <form method="POST" action="{{route('film_delete',['id'=>$film->id])}}">
        @csrf
        <button type="submit"><i class="fa-solid fa-trash"></i></button>
        </form>
      </div>
    </div>
    <iframe width="320" height="180" src="https://www.youtube.com/embed/{{str_replace('https://youtu.be/','',$film->link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="film__content"></iframe>
  </li>
  @endforeach
</ul>
@endif



</div>
@endsection