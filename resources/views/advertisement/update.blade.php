@include('includes.user.head')

<body>
@include('includes.user.navbar')

<div class="container">
    <div class="mt-4">
        <a style="text-decoration: none; color:black" href="{{ route('home') }}"><img style="width: 20px"
                                                                                      src="https://cdn-icons-png.flaticon.com/512/860/860790.png"
                                                                                      alt="">Назад</a>
    </div>
    <h3 class="mt-3">Редактировать объявление</h3>
</div>

<div class="container">
    <form method="POST" action="{{ route('advertisement.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="">
        <input type="hidden" value="{{ $advertisement['id'] }}" name="id">
        <div class="card-body">
            <div class="form-group mb-2">
                <label>Укажите название</label>
                <input value="{{ $advertisement['title'] }}" required name="title" type="text" class="form-control"
                       style="width:50%;height: 50px;font-size: 18px;" placeholder="Например, iPhone 8">
            </div>
            <div class="form-group mb-2">
                <label>Категория</label><br>
                <input readonly value="{{ $advertisement->category['title'] }}" required name="price" type="text"
                       class="form-control" style="width:30%;height:50px;font-size: 18px;">
            </div>
            <div class="form-group mb-2">
                <label>Описание</label>
                <textarea required name="description" class="form-control" style="width:70%" rows="6"
                          placeholder="Подумайте, какие подробности вы хотели бы узнать из объявления. И добавьте их в описание">
                    {{ $advertisement['description'] }}
                </textarea>
            </div>
            <div class="form-group mb-3">
                <label>Цена</label>
                <input value="{{ $advertisement['price'] }}" required name="price" type="number" class="form-control"
                       style="width:30%;height:50px;font-size: 18px;">
            </div>

            <div id="result">
                <div class="result 1">
                        <span class="full_container">
                            <label class="group_container">
                                <input hidden name="images[]" class="files" type="file" accept="image/*">
                            </label>
                        </span>
                    <span class="full_container">
                        <label class="group_container">
                            <input hidden name="images[]" class="files" type="file" accept="image/*">
                        </label>
                    </span>
                    <span class="full_container">
                        <label class="group_container">
                            <input hidden name="images[]" class="files" type="file" accept="image/*">
                        </label>
                    </span>
                    <span class="full_container">
                        <label class="group_container">
                            <input hidden name="images[]" class="files" type="file" accept="image/*">
                        </label>
                    </span>
                </div>
                <div class="result 2">
                    <span class="full_container">
                        <label class="group_container">
                            <input hidden name="images[]" class="files" type="file" accept="image/*">
                        </label>
                    </span>
                    <span class="full_container">
                        <label class="group_container">
                            <input hidden name="images[]" class="files" type="file" accept="image/*">
                        </label>
                    </span>
                    <span class="full_container">
                        <label class="group_container">
                            <input hidden name="images[]" class="files" type="file" accept="image/*">
                        </label>
                    </span>
                    <span class="full_container">
                        <label class="group_container">
                            <input hidden name="images[]" class="files" type="file" accept="image/*">
                        </label>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Редактировать</button>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/script.js') }}"></script>

<script>
    var images = JSON.parse('@php echo $advertisement->photos @endphp');
    render(images)
</script>

</body>
