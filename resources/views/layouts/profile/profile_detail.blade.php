<div class="artist__info">
      <ul class="tab">
        <li><a href="#goal"><img src="{{asset('/storage/common/goal.png')}}" alt="goal icon" class="detail__icon"></a></li>
        <li><a href="#member"><img src="{{asset('/storage/common/member.png')}}" alt="member icon" class="detail__icon"></a></li>
        <li><a href="#film"><img src="{{asset('/storage/common/film.png')}}" alt="film icon" class="detail__icon"></a></li>
        <li><a href="#connection"><img src="{{asset('/storage/common/connection.png')}}" alt="connection icon" class="detail__icon"></a></li>
      </ul>

      <div id="goal" class="info__area">
      @if($goal->global_id == Auth::id())
      <div class="back__button_area">
        <a href="/profile/edit/goal" class="edit__button" id="edit__button_goal">編集</a>
      </div>
      @endif
      @if($goal->body == "目標は未設定です")
        <h4 class="goal__nothing">目標はまだ設定されていません</h4>
      @else
       <p class="goal__text">{{$goal->body}}</p>
      @endif
      </div>
      <div id="member" class="info__area">
        @if($base->global_id == Auth::id())
          <a href="/profile/edit/member" class="edit__button" id="edit__button_member">編集</a>
        @endif
        @if(DB::table('members')->where('global_id', Auth::id())->exists())
          <ul class="member__list">
            @foreach($members as $member)
            <li class="member__card">
              <h5 class="member_name">{{$member->name}}</h5>
              <h6 class="member_part">{{$member->part}}</h6>
              <h6 class="member_role">{{$member->role}}</h6>
            </li>
            @endforeach
          </ul> 
          @else
          <h4 class="member__nothing">メンバーはまだ登録されていません</h4>
          @endif
      </div>
      <div id="film" class="info__area">
      @if($base->global_id == Auth::id())
              <a href="{{route('film_edit')}}" class="edit__button" id="edit__button_film">編集</a>
      @endif
        @if(DB::table('films')->where('global_id', Auth::id())->exists())
        <ul class="film__list">
          @foreach($films as $film)
          <li class="film__card">
           <h5 class="film__name">{{$film->name}}</h5>
           <iframe width="200" height="117" src="https://www.youtube.com/embed/{{str_replace('https://youtu.be/','',$film->link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="film__content"></iframe>
          </li>
          @endforeach
        </ul>
        @else
            <h4 class="member__nothing">"影響を受けた動画"はまだ設定されていません</h4>
        @endif
      </div>
      <div id="connection" class="info__area">
        @if(DB::table('connections')->where('global_id', Auth::id())->exists())
        <ul class="connection__list">
          @foreach($connections as $connection)
          <li class="connection__card">
            <a href="{{$connection->link}}" class="connection__image_area">
                <img src="{{asset($connection->path)}}" alt="artist that have a connection with them" class="connection__image">
            </a>
            <a href="{{$connection->link}}" class="connection__text_area">
                <h5 class="connection__project_name">{{$connection->name}}</h5>
                <div class="connection__tags">
                  <h6 class="connection__tag">{{$connection->genre}}</h6>
                  <h6 class="connection__tag">{{$connection->type}}</h6>
                  <h6 class="connection__tag">{{$connection->place}}</h6>
                </div>
                <p class="connection__desc">{{$connection->description}}</p>
                @if($connection->global_id == Auth::id())
                  <a href="{{route('connection_edit', ['id'=>$connection->id])}}" class="edit__button" id="edit__button_connection">編集</a>
                @endif
            </a>
          </li>
          @endforeach
        </ul>
        @else
        <h4 class="connection__nothing">繋がりのあるアーティストはまだいません</h4>
        @endif
      </div>
    </div>