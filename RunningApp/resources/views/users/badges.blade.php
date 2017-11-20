<ul class="badge_list">
    @foreach(Auth::user()->badges as $b)
        @if($b->pivot->level > 0)
<li class="badge_list_item">
            <div class="badge_container">
                <img src="{{$b->image}}" alt="BadgeImage" class="badge_img">
                <div class="badge_title"><p>{{$b->title}}</p></div>
                <p class="level">Level {{$b->pivot->level}}</p>
            </div>

            <div class="badge_description" style="display: none">
                <p>{{$b->description}}</p>
                <hr>
                <p>Unlock next level: {{$b->pivot->relevant_data}}/{{$b->pivot->unlock}} {{$b->unit}}</p>
            </div>
</li>@endif
    @endforeach
</ul>