<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>



<div class="container mt-4">
    <div class= "row d-inline-flex advertisements">

    </div>

    <div class="card full-advertisement mt-2 d-none">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title ad-title"></h5>
            <p class="card-text ad-description"></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>

    <script>
        $.ajax({
            url: "/api/advertisements",
            type: "GET",
            dataType: "json",
            success(data){
                for(let index in data){
                    $('.advertisements').append(`
                    <div class ="col-12 col-sm-6 col-md-3 p-2">
                        <div class="card h-100">
                            <a href="">
                                <img style="padding-left: 10px; padding-right: 10px" class="card-img-top pt-2 pr-2 pl-2" src="https://cdn-icons-png.flaticon.com/512/833/833281.png" alt="Card image cap">
                            </a>
                            <div class="card-body mb-0 pb-0 mb-2">
                                <h5 class="card-title">${data[index].title}</h5>
                                <p class="card-text"><small class="text-muted">${data[index].description.slice(0, 50)}...</small></p>
                                <p class="card-text"><small class="text-muted">${data[index].created_at}</small></p>
                                <span class="card-text"><strong>${data[index].price} грн.</strong></span>
                            </div>

                            <a href="" class="btn btn-success" onclick="full(${data[index].id})">Full</a>
                        </div>
                    </div>
                    `)
                }
            }
        })

        function full(id) {
            $.ajax({
                url: "/api/advertisements/" + id,
                type: "GET",
                dataType: "json",
                success(data){
                    console.log(data)
                }
            })
        }
    </script>

</body>
</html>
<?php /**PATH C:\OpenServer\domains\auth.com\resources\views/welcome.blade.php ENDPATH**/ ?>