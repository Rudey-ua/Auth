@include('includes.user.head')

<body>
@include('includes.user.navbar')

<section class="padding-y bg-light">
    <div class="container">
        <div class="row">
            <main class="col-lg-9">

                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">

                    @if(count($advertisements) > 1)
                        <strong class="d-block py-2">{{ count($advertisements) }} Items found </strong>
                    @elseif(count($advertisements) <= 1)
                        <strong class="d-block py-2">{{ count($advertisements) }} Item found </strong>
                    @endif

                    <div class="ms-auto">
                        <select class="form-select d-inline-block w-auto">
                            <option value="0">Best match</option>
                            <option value="1">Recommended</option>
                            <option value="2">High rated</option>
                            <option value="3">Randomly</option>
                        </select>
                    </div>
                </header>


            @foreach($advertisements as $advertisement)
                    @auth()
                        @php $statement = \App\Models\Favourite::where('advertisement_id', $advertisement->id)
                        ->where('user_id', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                        ->get() @endphp
                    @endauth

                    <article class="card card-product-list">
                    <div class="row g-0">
                        <aside class="col-xl-3 col-md-4">
                            @if(count($advertisement->photos) > 0)
                                <a href="{{ route('advertisement.view', $advertisement->id) }}" class="img-wrap"> <img src="{{ asset($advertisement->photos->first()['img_src']) }}"> </a>
                            @elseif(count($advertisement->photos) == 0)
                                <a href="{{ route('advertisement.view', $advertisement->id) }}" class="img-wrap"> <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640"> </a>
                            @endif
                        </aside> <!-- col.// -->
                        <div class="col-xl-9 col-md-8 border-start">
                            <div class="card-body">
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
                                    <a href="{{ route('advertisement.view', $advertisement->id) }}" class="title mb-2">{{ $advertisement->title }}</a>
                                <div class="price-wrap me-3">
                                    <span class="price h5"> ${{ number_format($advertisement->price, 0, ',', '.') }} </span>
                                    <del class="price-old"> ${{ number_format($advertisement->price + rand($advertisement->price/10, $advertisement->price/8), 0, ',', '.') }} </del>
                                </div> <!-- price-dewrap // -->

                                <p style="font-size: 13px;margin-top:5px;">{{ $advertisement->created_at }}</p>

                                <hr style="margin-top: 10px; margin-bottom: 8px">

                                <p class="text-muted mb-2">{{ mb_strimwidth($advertisement->description, 0, 140, "...") }}</p>
                                <a href="{{ route('advertisement.view', $advertisement->id) }}">Details</a>
                            </div> <!-- card-body .// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </article>
                @endforeach
            </main>

            <aside class="col-lg-3 col-sm-6 d-none d-lg-block">

                <!-- COMPONENTS SIDEBAR -->
                        @switch(app('request')->input('category_id'))
                            @case(9)
                                @include('includes.filters.cars')
                            @break;

                            @case(10)
                                @include('includes.filters.trucks')
                            @break;

                            @case(12)
                                @include('includes.filters.flats')
                            @break;
                        @endswitch
                <!-- ============= COMPONENTS SIDEBAR END .// ============= -->
            </aside>

        </div>
        {{ $advertisements->links() }}
    </div>
</section>

<script src="{{ asset('js/saveLocal.js') }}"></script>


</body>
