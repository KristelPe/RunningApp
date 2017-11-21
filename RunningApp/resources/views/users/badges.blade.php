<ul class="badge_list">
    @foreach(Auth::user()->badges as $b)
        @if($b->pivot->rank !== 'NOT EARNED')
<li class="badge_list_item">
            <div class="badge_container">
                <img src="{{$b->image}}" alt="BadgeImage" class="badge_img">
                <div class="badge_title"><p>{{$b->title}}</p></div>
                <p class="level">{{$b->pivot->rank}}</p>
            </div>

            <div class="badge_description" style="display: none">
                <p>{{$b->description}}</p>
                <hr>
                <p>{{$b->unlockText}} {{$b->pivot->unlock}} {{$b->unit}}</p>
            </div>
</li>@endif
    @endforeach
</ul>