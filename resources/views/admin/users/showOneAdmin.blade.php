@include('includes.user.head')
@include('includes.user.navbar')

<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<body>

<div class="container">

    <div class="mb-3 mt-3">
        <a style="text-decoration: none; color:black" href="{{ URL::previous() }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                        @if(count($photos) > 0)
                            <img src="{{ asset($photos->first()['img_src']) }}" class="product-image" alt="Product Image">
                        @elseif(count($photos) == 0)
                            <img src="https://www.ctilogistics.com/wp-content/uploads/2012/10/500x3004.gif" alt="">
                        @endif
                    </div>
                    <div class="col-12 product-image-thumbs">
                        @if(count($photos) > 0)
                            @foreach($photos as $photo)
                                <div class="product-image-thumb active"><img src="{{ asset($photo['img_src']) }}" alt="Product Image"></div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @foreach($advertisement as $item)
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $item['title'] }}</h3>
                        <p>{{ $item['description'] }}</p>
                        <hr>
                        <div class="bg-gray py-2 px-3 mt-4 mb-2">
                            <h2 class="mb-0">
                                {{ number_format($item['price'], 2, ',', '.') }} UAH
                            </h2>
                        </div>

                        <form action="{{ route('admin.advertisement.moderate') }}" method="post">
                            @csrf
                            <input type="hidden" name="advertisement_id" value="{{ $item['id'] }}">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            @if($item['checked'] == 0)
                                <button type="submit" class="btn btn-warning mt-2">
                                    Одобрить
                                </button>
                            @endif
                        </form>

                        <form action="{{ route('admin.advertisement.madeVip') }}" method="post">
                            @csrf
                            <input type="hidden" name="advertisement_id" value="{{ $item['id'] }}">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            @if($item['is_vip'] == 0)
                                <button type="submit" class="btn btn-success mt-2">
                                    Присвоить VIP-статус
                                </button>
                            @endif
                        </form>

                        <form action="{{ route('admin.advertisement.removeVip') }}" method="post">
                            @csrf
                            <input type="hidden" name="advertisement_id" value="{{ $item['id'] }}">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            @if($item['is_vip'] == 1)
                                <button type="submit" class="btn btn-danger mt-2">
                                    Лишить VIP-статуса
                                </button>
                            @endif
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $item['description'] }}</div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

</body>
