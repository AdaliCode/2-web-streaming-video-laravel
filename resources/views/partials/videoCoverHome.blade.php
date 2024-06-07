<div class="row mb-3 justify-content-center">
    <h1>{{ $title }}</h1>
    @foreach ($data as $item)
      @foreach ($item->videos as $key => $video)
        <div class="col-md-3 mb-3">
          <div class="card h-100">
            <div id="coverOverlay">
              <img src="cover/<?= ($item->id == 'variety-show-korea') ? 'variety.avif' : 'series.jpeg' ; ?>" class="card-img-top" alt="...">
              <div class="overlay-cover ms-2">
                <h5 class="card-title">
                  @if ($overlayTextType == 'rank')
                      Top {{ $loop->iteration + $rank }}
                      @if ($loop->last)
                        <?php $rank+=$loop->iteration ?>
                      @endif
                  @elseif ($overlayTextType == 'episode')
                      Episode {{ $video->episodeNow }}
                  @else
                      {{-- time release or Soon --}}
                      <?= (Carbon\Carbon::create($video->release)->diffInWeeks(Carbon\Carbon::now()) > -1) ? Carbon\Carbon::parse($video->release)->format('d M') : 'Soon' ; ?>
                  @endif
                </h5>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $video->title }}</h5>
              @if ($needCategorySubtitle == true)
                  <h6 class="card-subtitle text-secondary">{{ $item->name }}</h6>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    @endforeach
</div>