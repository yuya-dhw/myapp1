@extends('layouts.form')
@section('form_area')
<h2 class="form__title">関係性編集</h2>
<div class="form__area_connection">
  <ul class="connection__list">
         
    <li class="connection__card">
      <div class="connection__image_area">
        <img src="{{asset($connection->path)}}" alt="artist that have a connection with them" class="connection__image">
      </div>
      <div class="connection__text_area">
        <h5 class="connection__project_name">{{$connection->name}}</h5>
        <div class="connection__tags">
          <h6 class="connection__tag">{{$connection->genre}}</h6>
          <h6 class="connection__tag">{{$connection->type}}</h6>
          <h6 class="connection__tag">{{$connection->place}}</h6>
        </div>      
      </div>
    </li>
  </ul>
  <div class="connection__input_area">
    <form method="POST" action="{{route('connection_edit_post',['id'=>$connection->id])}}">
      @csrf
      <label for="connection_description" class="form__label">このユーザーとの関係性</label>
      @isset($connection->description)
      <input type="text" name="connection_description" id="connection_description" value="{{old('connection_description',$connection->description)}}">
      @endisset
      @empty($connection->description)
      <input type="text" name="connection_description" id="connection_description" value="{{old('connection_description')}}">
      @endempty
      <button type="submit" class="connection__submit_button">決定</button>
    </form>
  </div>
</div>
@endsection