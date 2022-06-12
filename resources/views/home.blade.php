@include('includes.user.head')
@include('includes.user.navbar')

<body>

<div class="container mt-4">

    <h2 style="text-align: center">Главные рубрики</h2>

    @foreach($categories as $category)
        <span style="font-size: 24px">
            <a href="/category/{{ $category['id'] }}">{{ $category['title'] }}</a>
        </span>
    @endforeach

    <h2 class="mt-4 mb-4" style="text-align: center">VIP-объявления</h2>

    <div class= "row d-inline-flex">
        @foreach($advertisements as $advertisement)
            <div class ="col-12 col-sm-6 col-md-3 p-2">
                <div class="card h-100">
                    <img class="card-img-top pt-2 pr-2 pl-2" src="" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $advertisement['title'] }}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">{{ $advertisement['created_at'] }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


</body>


