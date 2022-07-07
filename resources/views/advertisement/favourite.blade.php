@include('includes.user.head')
<body>
@include('includes.user.navbar')

<section class="padding-y">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">Обрані оголошення</h3>
        </header>

        <div class="row">

            @foreach($favourites as $favourite)
                @foreach($favourite->advertisements as $advertisement)

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
                                <a href="{{ route('favourite.delete', $advertisement->id) }}" class="float-end btn btn-light btn-icon"> <i style="color: red" class="fa fa-heart"></i> </a>
                                <strong class="price">${{ number_format($advertisement->price, 0, ',', '.') }}</strong> <!-- price.// -->
                                <a href="{{ route('advertisement.view', $advertisement->id) }}" class="title text-truncate">{{ $advertisement->title }}</a>
                                <small class="text-muted">{{ $advertisement->created_at }} — <strong>{{ $advertisement->user->name }}</strong></small>
                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                @endforeach
            @endforeach

        </div> <!-- row end.// -->

    </div> <!-- container end.// -->
</section>
</body>
