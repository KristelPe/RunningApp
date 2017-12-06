<ul class="badge_list">
    @foreach(Auth::user()->badges as $b)
        @if($b->pivot->rank !== 'NOT EARNED')
<li class="badge_list_item">
            <div class="badge_container">
                <img src="{{$b->image}}" alt="BadgeImage" class="badge_img">
                <div class="badge_detail">
                    <p class="badge_title">{{$b->title}}</p>
                    <p class="level">{{$b->pivot->rank}}</p>
                </div>
            </div>

            <div class="badge_description" style="display: none">
                <p>{{$b->description}}</p>
                <p class="bottom"><b>{{$b->unlockText}}:</b><br> {{$b->pivot->unlock}} {{$b->unit}}</p>
            </div>
</li>@endif
    @endforeach
</ul>