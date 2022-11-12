@extends('layouts.form')
@section('form_area')
<div class="form__search">
  <form action="{{route('search_result')}}" method="POST">
    @csrf
    <div class="search__bar">
      <input type="text" name="search_bar" id="search_bar">
        <button type="submit" class="search__button" value="">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
  </form>

  <div class="result__area">
  @isset($results)
    <ul>
      @foreach($results as $result)
        @if($result->project_name != "プロジェクト名を設定")
        <li class="connection__card result__card">
              <a href="{{route('browse',[$name = DB::table('users')->find($result->global_id)->name])}}" class="connection__image_area result__image">
                  <img src="{{asset(DB::table('images')->find($result->global_id)->path)}}" alt="" class="connection__image">
              </a>
              <a href="{{route('browse',[$name = DB::table('users')->find($result->global_id)->name])}}" class="connection__text_area">
                  <h5 class="connection__project_name">{{$result->project_name}}</h5>
                  <div class="connection__tags">
                    <h6 class="connection__tag">{{$result->genre}}</h6>
                    <h6 class="connection__tag">{{$result->type}}</h6>
                    <h6 class="connection__tag">{{$result->place}}</h6>
                    <p class="connection__desc">{{$result->copy}}</p>
                  </div>
              </a>
          </li>
        @else
        <li class="none"></li>
        @endif
      @endforeach
    </ul>
  @endisset
  </div>
  @empty($results)
    <h2 class="result__none">{{$search_status}}</h2>
  @endempty
</div>
@endsection
