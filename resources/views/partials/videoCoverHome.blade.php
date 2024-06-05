<div class="row mb-3 justify-content-center">
    <h1>{{ $title }}</h1>
    @foreach ($data as $key => $item)
      <div class="col-md-3 mb-3">
        <div class="card h-100">
          <div id="coverOverlay">
            <img src="cover.jpeg" class="card-img-top" alt="...">
            <div class="overlay-cover ms-2">
              <h5 class="card-title">
                @if ($overlayTextType == 'rank')
                    Top {{ $loop->iteration }}
                @elseif ($overlayTextType == 'episode')
                    Episode {{ $item->episodeNow }}
                @else
                    {{-- time release or Soon --}}
                    @if (Carbon\Carbon::create($item->release)->diffInWeeks(Carbon\Carbon::now()) > -1)
                        <h5 class="card-title">{{ Carbon\Carbon::parse($item->release)->format('d M') }}</h5>
                    @else
                        <h5 class="card-title">Soon</h5>
                    @endif
                @endif </h5>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $item->title }}</h5>
            @if ($needCategorySubtitle == true)
                <h6 class="card-subtitle text-secondary">{{ $CategorySubtitle }}</h6>
            @endif
          </div>
        </div>
      </div>
    @endforeach
</div>