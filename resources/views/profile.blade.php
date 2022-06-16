<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <title>Document</title>
</head>
<body>

<!--Navbar-->

@include('includes.user.navbar')

<!--End-Navbar-->

<div class="container rounded bg-white mb-4">
    <div class="mt-2">
        <a style="text-decoration: none; color:black" href="{{ URL::previous() }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>
    <div class="row">
        <div class="col-md-5 border-right">
            <form action="/profile/update/image" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $user['id'] }}">
                <div class="d-flex flex-column align-items-center text-center p-3 py-2">
                    @if($user['img_src'] == null)
                        <img class="rounded-3 mt-5" width="200px" src="{{ asset('storage/images/user.png') }}" alt="user_img">
                    @else
                        <img class="rounded-3 mt-5" width="200px" src="{{ $user['img_src'] }}" alt="user_img">
                    @endif
                    <span class="font-weight-bold">{{ $user['name'] }}</span>
                    <span class="text-black-50">{{ $user['email'] }}</span>

                    <div class="mt-2 mb-2 col-md-6">
                        <input required name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-success col-md-6 mt-2">Изменить аватар</button>
                </div>
            </form>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Настройки аккаунта</h4>
                </div>

                <form action="/profile/update" method="post">
                    @csrf
                    <div class="row mt-3">
                        <input type="hidden" name="id" value="{{ $user['id'] }}">
                        <div class="col-md-12">
                            <label class="labels">Контактное лицо</label>
                            <input required class="form-control @error('name') is-invalid @enderror" type="text" name="name" class="form-control" placeholder="first name" value="{{ $user['name'] }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <p style="margin-bottom: 0px">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="labels">Email</label><input required class="form-control @error('email') is-invalid @enderror" type="text" name="email" class="form-control" placeholder="enter email id" value="{{ $user['email'] }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <p style="margin-bottom: 0px">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="labels">День рождения</label>
                            <input id="dob" type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $user['dob'] }}" required autocomplete="dob">
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <p style="margin-bottom: 0px">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button  class="btn btn-primary profile-button mt-4" type="submit">Save Profile</button>
                </form>

                @if (Session::has('success_message'))
                    <div class="alert alert-success mt-4">
                        <strong>Success!</strong> Изменения были успешно применены
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
</body>
</html>
