<!doctype html>

<div class="artist__top pc__active">
      <h3 class="top__copy">{{$base->copy}}</h3>
      <h2 class="top__project_name">{{$base->project_name}}</h2>
</div>
<div class="artist__introduction">
  <h3 class="intro__project_name">{{$base->project_name}}</h3>
  <div class="intro__desc">
    <div class="desc__tags">
      <h4 class=tag>{{$base->genre}}</h4>
      <h4 class="tag">{{$base->type}}</h4>
      <h4 class="tag">{{$base->place}}</h4>
    </div>
    <div class="desc__interaction">
      
        <form method="POST">
          @csrf
          <input type="hidden" name="connected_id" value="{{$base->global_id}}">
          <input type="hidden" name="connected_link" value="/profile/{{$user->name}}">
          <input type="hidden" name="connected_path" value="{{$image->path}}">
          <input type="hidden" name="connected_name" value="{{$base->project_name}}">
          <input type="hidden" name="connected_genre" value="{{$base->genre}}">
          <input type="hidden" name="connected_place" value="{{$base->place}}">
          <input type="hidden" name="connected_type" value="{{$base->type}}">
        @if($user->id == Auth::id())
        <button class="none"></button>
        @elseif(DB::table('connections')->where([
        ['global_id', Auth::id()],
        ['connected_id', $base->global_id]
        ])->doesntExist())
        <button formaction="{{route('connection_add')}}" class="interaction__general connection__button" name="connection">人脈に追加</button>
        @else
          <button formaction="{{route('connection_delete')}}" class="interaction__delete" name="connection">人脈を削除</button>
        @endif
        </form>
        <button class="interaction__general share__button"><a href="#modal0" class="modal__link" name="share">共有</a></button>
        <div class="remodal share__area" data-remodal-id="modal0">
          <div class="share__area_link">
            <input id="share__link" type="text" value="localhost/profile/{{$user->name}}" readonly="readonly">
            <!--本番環境アップ時にリンクを正規のものに変更-->
            <button class="share__button_link"  onclick="Clipboard()"><i class="fa-solid fa-clipboard"></i></button>
          </div>
          <div class="share__area_sns">
          <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
          <script>
            
            async function Clipboard() {
              const link = document.getElementById('share__link');
              try {
                await navigator.clipboard.writeText(link.value);
                alert('コピーできました');
              } catch (err) {
                alert('コピーできませんでした', err);
              }
            }
          </script>
        </div>
    </div>
  </div>
</div>
<div class="artist__announce">
  <div class="announce__release">
    @if($base->release_exist == 1)
    <a href="#modal1" class="modal__link">
      <h4 class="announce__type">次のリリース
        @isset($base->release_date)
          <span class="announce__date">{{$release_month}}&#047;{{$release_day}}</span>
        @endisset
      </h4>
    </a>
    <div class="remodal" data-remodal-id="modal1">
          <h3 class="announce__name">{{$base->release_name}}</h3>
          <h5 class="announce__desc">{{$base->release_type}}</h5>
          <div class="announce__link">
            <a href="{{$base->release_link}}" class="link__general">配信サイトへ</a>
          </div>
          <button data-remodal-action="close" class="remodal-close"></button>
        </div>
          <div class="pc__active">
            <h3 class="announce__name">{{$base->release_name}}</h3>
            <h5 class="announce__desc">{{$base->release_type}}</h5>
            <div class="announce__link">
            <a href="{{$base->release_link}}" class="link__general">配信サイトへ</a>
            </div>
        </div>
    @else
    <h4 class="announce__type">次のリリース</h4>
    <h5 class="announce__nothing">未定</h5>
    @endif    
  </div>
  <div class="announce__event">
    @if($base->event_exist == 1)
    <a href="#modal2" class="modal__link">
      <h4 class="announce__type">次のイベント
        @isset($event_month)
          <span class="announce__date">{{$event_month}}&#047;{{$event_day}}</span>
        @endisset
      </h4>
    </a>
    <div class="remodal" data-remodal-id="modal2">
          <h3 class="announce__name">{{$base->event_name}}</h3>
          <h5 class="announce__desc">{{$base->event_place}}</h5>
          <div class="announce__link">
            <a href="{{$base->event_link}}" class="link_general">イベントページ</a>
          </div>
          <div class="announce__link">
            <a href="{{$base->event_link_com}}" class="link__general">イベントのcomusionページ</a>
          </div>
          <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <div class="pc_active">
          <h3 class="announce__name">{{$base->event_name}}</h3>
          <h5 class="announce__desc">{{$base->event_place}}({{$base->event_pref}})</h5>
          <div class="announce__link">
            <a href="{{$base->event_link}}" class="link__general">イベントページ</a>
          </div>
          <div class="announce__link">
            <a href="{{$base->event_link_com}}" class="link__general">イベントのcomusionページ</a>
          </div>
        </div>
    @else
    <h4 class="announce__type">次のイベント</h4>
    <h5 class="announce__nothing">未定</h5>
    @endif

    </div>
</div>