@include('includes.user.head')

<body>
@include('includes.user.navbar')

<section class="padding-y">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">Результати пошуку - {{ $search_request }} ({{ count($advertisements) }})</h3>
        </header>

        <div class="row">

            @foreach($advertisements as $advertisement)
                @if($advertisement['checked'] && $advertisement['is_vip'])

                    @auth()
                        @php $statement = \App\Models\Favourite::where('advertisement_id', $advertisement->id)
                        ->where('user_id', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                        ->get() @endphp
                    @endauth

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <figure class="card-product-grid">
                            <a href="{{ route('advertisement.view', $advertisement->id) }}" class="img-wrap rounded bg-gray-light">
                                @if(count($advertisement->photos) > 0)
                                    <img class="card" src="{{ asset($advertisement->photos->first()['img_src']) }}" alt="Card image cap">
                                @elseif(count($advertisement->photos) == 0)
                                    <img class="card-img-top pt-2 pr-2 pl-2" src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" alt="Card image cap">
                                @endif
                            </a>
                            <figcaption class="pt-2">
                                @auth()
                                    @if(count($statement) == 1)
                                        <a href="{{ route('favourite.delete', $advertisement->id) }}"  class="float-end btn btn-light btn-icon">
                                            <i class="fa fa-heart" style="color: red"></i>
                                        </a>
                                    @elseif(count($statement) == 0)
                                        <a href="{{ route('favourite.add', $advertisement->id) }}"  class="float-end btn btn-light btn-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    @endif
                                @endauth
                                <strong class="price">${{ number_format($advertisement->price, 0, ',', '.') }}</strong> <!-- price.// -->
                                <a href="{{ route('advertisement.view', $advertisement->id) }}" class="title text-truncate">{{ $advertisement->title }}</a>
                                <small class="text-muted">{{ $advertisement->created_at }} — <strong>{{ $advertisement->user->name }}</strong></small>
                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                @endif
            @endforeach

        </div> <!-- row end.// -->
        {{ $advertisements->links() }}
    </div> <!-- container end.// -->
</section>

</body>
