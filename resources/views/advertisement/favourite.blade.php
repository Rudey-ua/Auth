@include('includes.user.head')
@include('includes.user.navbar')

<div class="container">
    <h3 class="mt-4">Избранные объявления</h3>
</div>

<div class="container">
    <div class= "row d-inline-flex">
        @foreach($favourites as $favourite)
            @foreach($favourite->advertisements as $advertisement)
                <div class ="col-12 col-sm-6 col-md-3 p-2">
                    <div class="card h-100">
                        <a href="{{ route('advertisement.view', $advertisement['id']) }}">
                            @if(count($advertisement->photos) > 0)
                                <img class="card-img-top pt-2 pr-2 pl-2" src="{{ asset($advertisement->photos->first()['img_src']) }}" alt="Card image cap">
                            @elseif(count($advertisement->photos) == 0)
                                <img class="card-img-top pt-2 pr-2 pl-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAAP1BMVEXe3t6Ih4eVlJSEg4Pi4uLb29uwsLDj4+OpqKiBgICkpKSbm5vc3Nyrq6vV1dWLioq5ubnPz8/FxMS4t7eRkZHFYcZPAAABl0lEQVR4nO3ayY6qQBiAUaAKZHRoff9nvQzSDlHYdEJyOWehRF2QL78lpkgSAAAAAAAAAAAAAAAAAAAAAAAAAPh78bAibn2GWzt22YrysvNIt7AqPW59kluK53Cqy2Wn0O15jGIRsjYuOjSh3vo0tzQkyofntv02KVGiMdG5aYr2y0ckGhLVVZqGU/75IxJlefwJaS8UT9+1x6FEQ6JuTJQ2T29cj3MkiYZExXuiQ1dl8/ot0ZDoMhaqzr+D049VyO5zJNG4XF/T/iL6EWKcqtBMjSSafvQvXffz9No4VdM7Es2Xjr37S4f74t03uuVRojnReDw9nudC6bQeSfSbqC3GcTqnT/r1SKJHorJq8nh4KdQ3qqNEc6J6+J3Pr+E1UdpINCeqxza39J1Ec6LyfXokmt0TldWXQhK9/keT6JOXf/oSfSLRqilRWX2VSTQu1/kCV9d9osQm0ZJ4DaeuWLbzrcakPa1vWIddb1gn8VKv3fZQ7/22hyQuLdaDuPdCAAAAAAAAAAAAAAAAAAAAAAAAAAD8t/4Bx0ESOBoYNLUAAAAASUVORK5CYII=" alt="Card image cap">
                            @endif
                        </a>
                        <div class="card-body mb-0 pb-0">
                            <a style="color: black" href="{{ route('advertisement.view', $advertisement['id']) }}">
                                <h5 class="card-title">{{ $advertisement['title'] }}</h5>
                            </a>
                            <p class="card-text"><small class="text-muted">{{ $advertisement['created_at'] }}</small></p>
                            <span class="card-text"><strong>{{ $advertisement['price'] }} USD</strong></span>

                            <form method="post" class="mt-1" action="{{ route('favourite.delete') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $favourite['id'] }}">
                                <button style="background-color: white; border-width: 1px" type="submit">
                                    Убрать из избранного
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>

