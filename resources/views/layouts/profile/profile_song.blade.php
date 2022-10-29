<div class="artist__song">
@if($song->global_id == Auth::id())
  <a href="/profile/edit/song" class="edit__button pc__active" id="edit__button_song">編集</a>
@endif
@isset($song->path)
  <div class="song__area">
    <h3 class="song__desc">{{$song->description}}</h3>
    <figure class="song__area">
      <figcaption class="song__name">{{$song->name}} by {{$base->project_name}}</figcaption>
      <audio controls src="{{asset($song->path)}}"></audio>
    </figure>
  </div>
@endisset
@empty($song->path)
  <h4 class="song__nothing">楽曲は登録されていません</h4>
@endempty
</div>