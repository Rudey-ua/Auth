<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>


<!-- ============== SECTION CONTENT ============== -->
<section class="padding-y">
    <div class="container">

        <?php $__currentLoopData = $advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
            <aside class="col-lg-6">
                <article class="gallery-wrap">
                    <div class="img-wrap img-thumbnail">


                        <?php if(count($photos) > 0): ?>
                            <a data-fslightbox="mygalley" data-type="image" href="<?php echo e(asset($photos->first()['img_src'])); ?>">
                                <img height="260" src="<?php echo e(asset($photos->first()['img_src'])); ?>">
                            </a>
                        <?php elseif(count($photos) == 0): ?>
                            <img src="https://www.ctilogistics.com/wp-content/uploads/2012/10/500x3004.gif" alt="">
                        <?php endif; ?>

                    </div> <!-- img-big-wrap.// -->
                    <div class="thumbs-wrap">
                        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a data-fslightbox="mygalley" data-type="image" href="<?php echo e(asset($photo->img_src)); ?>" class="item-thumb">
                                <img width="60" height="60" src="<?php echo e(asset($photo->img_src)); ?>">
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- thumbs-wrap.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <article class="ps-lg-3">
                    <h4 class="title text-dark"><?php echo e($item->title); ?></h4>

                    <hr>

                    <div class="mb-3">
                        <var class="price h5">$<?php echo e(number_format($item->price, 0, ',', '.')); ?></var>
                        <span class="text-muted">/per box</span>
                    </div>

                    <p><?php echo e($item->description); ?></p>

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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div> <!-- container .//  -->
</section>
<!-- ============== SECTION CONTENT END// ============== -->

</body>


<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/advertisement/showOne.blade.php ENDPATH**/ ?>