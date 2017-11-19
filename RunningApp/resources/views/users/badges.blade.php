<ul class="badge_list">
    @foreach(Auth::user()->badges as $b)
<li class="badge_list_item">
            <div class="badge_container">
                <img src="{{$b->image}}" alt="BadgeImage" class="badge_img">
                <div class="badge_title"><p>{{$b->title}}</p></div>
                <p class="level">Level {{$b->pivot->level}}</p>
            </div>

            <div class="badge_description" style="display: none">
                <p>{{$b->description}}</p>
                <p>{{$b->pivot->relevant_data}}</p>
            </div>
</li>
    @endforeach
</ul>