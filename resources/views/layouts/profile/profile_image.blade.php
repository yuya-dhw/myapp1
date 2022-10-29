@if($image->global_id == Auth::id())
  <a href="/profile/edit/image" id="edit__button_image" class="edit__button">編集</a>
@endif
<div class="image__attachment">

  <div class="column1__text sp__active">
    <h3 class="top__copy">{{$base->copy}}</h3>
    <h2 class="top__project_name">{{$base->project_name}}</h2>
  </div>
  <div class="image__attachment_clip">
  <img src="{{asset($image->path)}}" alt="profile image" class="image__content">
  </div>
</div>