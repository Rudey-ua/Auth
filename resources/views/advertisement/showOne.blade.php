@include('includes.user.head')
@include('includes.user.navbar')
<body>


<!-- ============== SECTION CONTENT ============== -->
<section class="padding-y">
    <div class="container">

        @foreach($advertisement as $item)
            <div class="row">
            <aside class="col-lg-6">
                <article class="gallery-wrap">
                    <div class="img-wrap img-thumbnail">


                        @if(count($photos) > 0)
                            <a data-fslightbox="mygalley" data-type="image" href="{{ asset($photos->first()['img_src']) }}">
                                <img height="260" src="{{ asset($photos->first()['img_src']) }}">
                            </a>
                        @elseif(count($photos) == 0)
                            <img src="https://www.ctilogistics.com/wp-content/uploads/2012/10/500x3004.gif" alt="">
                        @endif

                    </div> <!-- img-big-wrap.// -->
                    <div class="thumbs-wrap">
                        @foreach($photos as $photo)
                            <a data-fslightbox="mygalley" data-type="image" href="{{ asset($photo->img_src) }}" class="item-thumb">
                                <img width="60" height="60" src="{{ asset($photo->img_src) }}">
                            </a>
                        @endforeach
                    </div> <!-- thumbs-wrap.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <article class="ps-lg-3">
                    <h4 class="title text-dark">{{ $item->title }}</h4>

                    <hr>

                    <div class="mb-3">
                        <var class="price h5">${{ number_format($item->price, 0, ',', '.') }}</var>
                        <span class="text-muted">/per box</span>
                    </div>

                    <p>{{ $item->description }}</p>

                    <dl class="row">
                        <dt class="col-3">Type:</dt>
                        <dd class="col-9">Regular</dd>

                        <dt class="col-3">Color</dt>
                        <dd class="col-9">Brown</dd>

                        <dt class="col-3">Material</dt>
                        <dd class="col-9">Cotton, Jeans </dd>

                        <dt class="col-3">Brand</dt>
                        <dd class="col-9">Reebook </dd>
                    </dl>

                    <hr>
                    <a href="#" class="btn  btn-warning"> Buy now </a>
                    <a href="#" class="btn  btn-light"> <i class="me-1 fa fa-heart"></i> Save </a>

                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->


        </div> <!-- row.// -->
        @endforeach

    </div> <!-- container .//  -->
</section>
<!-- ============== SECTION CONTENT END// ============== -->

</body>


