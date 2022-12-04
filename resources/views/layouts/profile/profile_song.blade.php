<div class="artist__song">
@isset($song->path)
  <div class="song__area">
    <h3 class="song__desc">{{$song->description}}</h3>
      <audio src="{{asset($song->path)}}" id="media"></audio>
      <div class="song__play_area">
        <button id="play__button"><i id="button__icon" class="fa-solid fa-play"></i></button>
        <div class="play__name">
          <h5 class="song__name">{{$song->name}} by {{$base->project_name}}</h5>
          <script>
              const audio = document.querySelector("#media");
              const playbutton = document.querySelector("#play__button");
              const buttonicon = document.getElementById('button__icon')
            
                  playbutton.addEventListener('click', function () {
                    if(audio.paused){
                      audio.play();
                      $('i').removeClass('fa-solid fa-play');
                      $('i').addClass('fa-solid fa-pause');
                    }else{
                      audio.pause();
                      $('i').removeClass('fa-solid fa-pause');
                      $('i').addClass('fa-solid fa-play');
                    }
                  
                  });

          </script>
        </div>
      </div>
  </div>
@endisset
@empty($song->path)
  <h4 class="song__nothing">楽曲は登録されていません</h4>
@endempty
</div>