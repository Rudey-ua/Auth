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
                            <img class="card-img-top pt-2 pr-2 pl-2" src="{{ $advertisement->photos->first()['img_src'] }}" alt="Card image cap">
                        </a>
                        <div class="card-body mb-0 pb-0">
                            <a style="color: black" href="{{ route('advertisement.view', $advertisement['id']) }}">
                                <h5 class="card-title">{{ $advertisement['title'] }}</h5>
                            </a>
                            <p class="card-text"><small class="text-muted">{{ $advertisement['created_at'] }}</small></p>
                            <span class="card-text"><strong>{{ $advertisement['price'] }} грн.</strong></span>

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

