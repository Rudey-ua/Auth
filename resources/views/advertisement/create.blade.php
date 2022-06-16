<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slando</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
@include('includes.user.navbar')

<div class="container">
    <div class="mt-3">
        <a style="text-decoration: none; color:black" href="{{ URL::previous() }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>
    <h3 class="mt-3">Создать объявление</h3>
</div>

<div class="container">
    <form method="POST" action="{{ route('advertisement.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Укажите название</label>
                <input required name="title" type="text" class="form-control" style="width:50%;height: 50px;font-size: 18px;" placeholder="Например, iPhone 8">
            </div>
            <div class="form-group">
                <label>Выберите категорию</label><br>
                <select name="category" style="width:50%;height: 50px;" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Описание</label>
                <textarea required name="description" class="form-control" style="width:70%" rows="3" placeholder="Подумайте, какие подробности вы хотели бы узнать из объявления. И добавьте их в описание"></textarea>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input required name="price" type="text" class="form-control" style="width:30%;height:50px;font-size: 18px;">
            </div>

            <div class="form-group" style="width: 30%">
                <div class="custom-file">
                    <input required type="file" multiple name="images[]" class="custom-file-input" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Опубликовать</button>
        </div>
        </div>
    </form>
</div>

</body>
</html>
