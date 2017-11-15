
    @foreach(Auth::user()->badges as $b)

            <div class="badge_container">
                <img src="{{$b->image}}" alt="BadgeImage" class="badge_img">
                <div class="badge_title"><p>{{$b->title}}</p></div>
            </div>
            <div class="badge_description" style="display: none"><p>{{$b->description}}</p></div>

    @endforeach
