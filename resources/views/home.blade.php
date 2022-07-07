@include('includes.user.head')

<body>
@include('includes.user.navbar')

<section class="section-intro padding-y-lg" style="padding-top: 50px; padding-bottom: 50px; background-color: #FFCE30">
    <div class="container">

        <article class="my-5">
            <h1 class="display-4 text-black"> Slando — платформа, яка об'єднує людей</h1>
        </article>

    </div> <!-- container end.// -->
</section>

<div class="container mt-4">
    <form action="{{ route('advertisement.search_result') }}" method="GET">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="input-group mb-3">
                    <input required name="title" type="text" class="form-control form-control-lg" placeholder="Шукайте, що потрібно">
                    <button type="submit" class="input-group-text btn-success"><i class="bi bi-search"></i>Знайти</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="card mt-2">
        <div class="content-body">
            <nav class="row gy-4">
                @foreach($categories as $category)
                    @if($category->parent_id == null)
                        <div class="col-xl col-lg-2 col-md-3 col-4">
                            <a href="#" class="item-link text-center" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                  <span class="icon icon-lg mb-2 rounded-3">
                                    <img width="42" height="42" src="{{ $category->img_src }}" alt="img_src">
                                  </span>
                                <span class="text"> {{ $category->title }} </span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($category->getSubCategories as $item)
                                    <li><a class="dropdown-item" href="/filter/?category_id={{ $item->id }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div> <!-- col.// -->
                    @endif
                @endforeach
            </nav>
        </div> <!-- card-body.// -->
    </div> <!-- card.// -->
</div>

<!-- ================ SECTION PRODUCTS ================ -->
<section class="padding-y">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">VIP-оголошення</h3>
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

    </div> <!-- container end.// -->
</section>
<!-- ================ SECTION PRODUCTS END.// ================ -->

@include('includes.user.footer')

</body>

<script>
    sessionStorage.clear()
</script>
