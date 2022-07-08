<div>
    <div class="row mb-3 my-3">
        <div class="d-flex justify-content-between">
            <div>
                <span>
                    <i class="fa fa-light fa-users"></i>
                    <strong id="count">{{ count($bids) }} bids</strong>
                    @if (count($bids) != 0)
                        , lider <strong id="login">{{ $bids->last()->user()->login }}</strong>
                    @endif
                </span>
            </div>

            <div>
                <span>
                    <i class="fa fa-regular fa-clock"></i>
                    {{-- @php
                        $date = new DateTime(date('Y-m-d H:i:s'));
                        $date->add(new DateInterval('PT3H'));
                        $diff = $date->diff(new DateTime($ad->time));
                    @endphp
                    <strong>
                        {{ $diff->format('%H год. %i хв.') }}
                    </strong> --}}
                    ({{ $ad->time }})
                </span>
            </div>
        </div>

    </div>
    <hr>
    <div class="row mb-4">

        <div class="col">
            <div class="price mb-4 mt-2">
                Last bid:
                <strong class="text-danger" id="last_bid">{{ $bids->last()->price }}$</strong>
            </div>
            @if ($bids->last()->price < $ad->price * 0.6)
                <div>
                    Buy now:
                    <strong class="text-danger">{{ $ad->price }}$</strong>
                </div>
            @endif
        </div>

        <div class="col">
            <div class="input-group">
                <input type="number" id='price' value="{{ $bids->last()->price + $ad->min_bid }}"
                    class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>

        <div class="col">
            @auth
                <div class="row mb-2 ml-2 mr-2 pl-2">
                    <button class="btn btn-primary make-bid">Зробити ставку</button>
                </div>
                @if ($bids->last()->price < $ad->price * 0.6)
                    <div class="row">
                        <button class="btn btn-danger">Купити зараз</button>
                    </div>
                @endif
            @endauth
            @guest
                <div class="row mb-2 ml-2 mr-2 pl-2">
                    <a href="/login">
                        <button class="btn btn-primary">Зробити ставку</button>
                    </a>
                </div>
                @if ($bids->last()->price < $ad->price * 0.6)
                    <div class="row">
                        <a href="/login">
                            <button class="btn btn-danger">Купити зараз</button>
                        </a>
                    </div>
                @endif
            @endguest
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.make-bid').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/api/makebid',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    price: $('#price').val(),
                    ad_id: $('#id').text(),
                    uid: "{{Auth::user()->id}}"
                },
                success: function(res) {
                    $('#last_bid').text($('#price').val());
                    $('#price').val(res.price);
                    $('#count').text(res.count);
                    $('#login').text(res.login);
                },
                error: function(jqXHR, exception){
                    console.log(jqXHR);
                    console.log(exception);
                }

            });
        });
    });
</script>
