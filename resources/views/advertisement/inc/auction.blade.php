<div>
    <div class="row mb-3 my-3">
        <div class="d-flex justify-content-between">
            <div>
                <span>
                    <i class="fa fa-light fa-users"></i>
                    <strong>{{ count($bids) }} bids</strong>
                    @if (count($bids) != 0)
                        , lider <strong>{{ $bids->last()->user()->login }}</strong>
                    @endif
                </span>
            </div>

            <div>
                <span>
                    <i class="fa fa-regular fa-clock"></i>
                    @php
                        $date = new DateTime(date('Y-m-d H:i:s'));
                        $date->add(new DateInterval('PT3H'));
                        $diff = $date->diff(new DateTime($ad->time));
                    @endphp
                    <strong>
                    {{$diff->format('%H год. %i хв.')}}
                    </strong>({{ $ad->time }})
                </span>
            </div>
        </div>

    </div>
    <hr>
    <div class="row mb-4">

        <div class="col">
            <div class="price mb-4 mt-2">
                Last bid:
                <strong class="text-danger">{{ $bids->last()->price }}$</strong>
            </div>
            @if ($bids->last()->price < $ad->price * 0.6)
                <div>
                    Buy now:
                    <strong class="text-danger">{{$ad->price}}$</strong>
                </div>
            @endif
        </div>

        <div class="col">
            <div class="input-group">
                <input type="number" value="{{$bids->last()->price + $ad->min_bid}}" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>

        <div class="col">
            <div class="row mb-2 ml-2 mr-2 pl-2">
                <button class="btn btn-primary">Зробити ставку</button>
            </div>
            @if ($bids->last()->price < $ad->price * 0.6)
                <div class="row">
                    <button class="btn btn-danger">Купити зараз</button>
                </div>
            @endif
        </div>
    </div>
</div>
