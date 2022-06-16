@include('includes.user.head')
@include('includes.user.navbar')

<body>

<div class="container mt-4">

    <h2 style="text-align: center">Главные рубрики</h2>

        <div style="margin-left: 70px" class="col-md-12">
            <ul class="list-group list-group-horizontal">
                @foreach($categories as $category)
                    <a class="mt-4" style="text-decoration: none" href="/category/{{ $category['id']}}">
                        <li class="list-group-item">
                            {{ $category['title'] }}
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>


    <h2 class="mt-4 mb-4" style="text-align: center">VIP-объявления</h2>

    <div class= "row d-inline-flex">
        @foreach($advertisements as $advertisement)
            @if($advertisement['is_vip'])
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
                            <p style="font-size: 13px; margin-bottom: 0; margin-top: 5px;">Пользователь - <strong>{{ $advertisement->user['name'] }}</strong></p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</div>

</body>


