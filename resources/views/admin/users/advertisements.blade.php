@include('includes.user.head')
<body>
@include('includes.user.navbar')

<div class="container">

    <div class="mt-4">
        <a style="text-decoration: none; color:black" href="{{ route('admin.user.index') }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>

    <h4 class="mt-4">
        Объявления пользователя - {{ $user['name'] }}
    </h4>
    <p class="mb-4">Login -
        <strong>
            {{ $user['login'] }}
        </strong>
    </p>

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
                <th>Moderation</th>
            </tr>
            </thead>
            <tbody>

            @foreach($advertisements as $ad)
                <tr>
                    <td>{{ $ad['id'] }}</td>
                    <td>{{ $ad['title'] }}</td>
                    <td>{{ $ad->category['title'] }}</td>
                    <td>{{ $ad['created_at']->format('m.d.Y') }}</td>
                    <td>{{ $ad['views'] }}</td>
                    <td>{{ $ad['price'] }}</td>
                    <td><form style="margin-left: 10px" method="POST" action="{{ route('admin.advertisement.updatePage') }}">
                            @csrf
                            <input name="id" type="hidden" value="{{ $ad['id'] }}">
                            <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                            <button style="border: 0; background-color: white"  type="submit">
                                <img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_76537.png" alt="">
                            </button>
                        </form></td>
                    <td><form style="margin-left: 10px" method="POST" action="{{ route('admin.advertisement.destroy') }}">
                            @csrf
                            <input name="id" type="hidden" value="{{ $ad['id'] }}">
                            <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                            <button style="border: 0; background-color: white"  type="submit">
                                <img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_215128.png" alt="">
                            </button>
                        </form></td>

                    <td>
                        <a href="/admin/user/{{ $user['id'] }}/advertisement/{{ $ad['id'] }}">
                            <img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/72/72647.png" alt="">
                        </a>
                    </td>
                    @if($ad['checked'])
                        <td><strong style="color: green;">Одобрено</strong></td>
                    @else
                        <td><strong style="color: red;">Не одобрено</strong></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>

