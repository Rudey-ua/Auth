@include('includes.user.head')
<body>
@include('includes.user.navbar')

<div class="container mt-4">
    <div class="mt-2 mb-3">
        <a style="text-decoration: none; color:black" href="{{ route('profile') }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>

    <h3 class="mb-4">Мои заказы</h3>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Views</th>
                <th>Price</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>

            @foreach($purchases as $purchase)

                @php
                    $advertisement_id = $purchase['advertisement_id'];
                    $advertisement = \App\Models\Advertisement::where('id', $advertisement_id)->get()
                @endphp

                @foreach($advertisement as $ad)
                    <tr>
                        <td>{{ $ad['id'] }}</td>
                        <td>{{ $ad['title'] }}</td>
                        <td>{{ $ad->category['title'] }}</td>
                        <td>{{ $ad['created_at']->format('m.d.Y') }}</td>
                        <td>{{ $ad['views'] }}</td>
                        <td>{{ $ad['price'] }}</td>
                        <td><a style="margin-left: 10px" href="/advertisement/{{ $ad['id'] }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/72/72647.png" alt=""></a></td>
                    </tr>
                @endforeach

            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>




