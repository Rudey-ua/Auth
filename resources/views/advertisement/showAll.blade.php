@include('includes.user.head')
<body>
@include('includes.user.navbar')

<div class="container mt-4">
    <div class="mt-2 mb-3">
        <a style="text-decoration: none; color:black" href="{{ route('home') }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>

    <h3 class="mb-4">Мои объявления</h3>
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
                <th>Update</th>
                <th>Delete</th>
                <th>View</th>
            </tr>
        </thead>
            <tbody>

            @foreach($ads as $ad)
                <tr>
                    <td>{{ $ad['id'] }}</td>
                    <td>{{ $ad['title'] }}</td>
                    <td>{{ $ad->category['title'] }}</td>
                    <td>{{ $ad['created_at']->format('m.d.Y') }}</td>
                    <td>{{ $ad['views'] }}</td>
                    <td>{{ $ad['price'] }}</td>
                    <td><form style="margin-left: 10px" method="POST" action="{{ route('advertisement.updatePage') }}">
                            @csrf
                            <input name="id" type="hidden" value="{{ $ad['id'] }}">
                            <button style="border: 0; background-color: white"  type="submit">
                                <img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_76537.png" alt="">
                            </button>
                        </form></td>
                    <td><form style="margin-left: 10px" method="POST" action="{{ route('advertisement.destroy') }}">
                            @csrf
                            <input name="id" type="hidden" value="{{ $ad['id'] }}">
                            <button style="border: 0; background-color: white"  type="submit">
                                <img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_215128.png" alt="">
                            </button>
                        </form></td>
                    <td><a style="margin-left: 10px" href="/advertisement/{{ $ad['id'] }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/72/72647.png" alt=""></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $ads->links() }}
</div>

</body>




