@include('includes.user.head')
@include('includes.user.navbar')

<body>

<div class="container mt-4">
    <div class="mb-3">
        <a style="text-decoration: none; color:black" href="{{ URL::previous() }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>
    <div class= "row d-inline-flex">
        <h3>{{ $category->first()['title'] }}</h3>
        @foreach($advertisements as $advertisement)
            <div class ="col-12 col-sm-6 col-md-3 p-2">
                <div class="card h-100">
                    <a href="{{ route('advertisement.view', $advertisement['id']) }}">
                        <img class="card-img-top pt-2 pr-2 pl-2" src="{{ asset($advertisement->photos->first()['img_src']) }}" alt="Card image cap">
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
        @endforeach
    </div>
</div>

</body>
