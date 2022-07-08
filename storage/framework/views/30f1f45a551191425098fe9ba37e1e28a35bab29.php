<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="padding-y">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">Результати пошуку - <?php echo e($search_request); ?> (<?php echo e(count($advertisements)); ?>)</h3>
        </header>

        <div class="row">

            <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($advertisement['checked'] && $advertisement['is_vip']): ?>

                    <?php if(auth()->guard()->check()): ?>
                        <?php $statement = \App\Models\Favourite::where('advertisement_id', $advertisement->id)
                        ->where('user_id', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                        ->get() ?>
                    <?php endif; ?>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <figure class="card-product-grid">
                            <a href="<?php echo e(route('advertisement.view', $advertisement->id)); ?>" class="img-wrap rounded bg-gray-light">
                                <?php if(count($advertisement->photos) > 0): ?>
                                    <img class="card" src="<?php echo e(asset($advertisement->photos->first()['img_src'])); ?>" alt="Card image cap">
                                <?php elseif(count($advertisement->photos) == 0): ?>
                                    <img class="card-img-top pt-2 pr-2 pl-2" src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" alt="Card image cap">
                                <?php endif; ?>
                            </a>
                            <figcaption class="pt-2">
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(count($statement) == 1): ?>
                                        <a href="<?php echo e(route('favourite.delete', $advertisement->id)); ?>"  class="float-end btn btn-light btn-icon">
                                            <i class="fa fa-heart" style="color: red"></i>
                                        </a>
                                    <?php elseif(count($statement) == 0): ?>
                                        <a href="<?php echo e(route('favourite.add', $advertisement->id)); ?>"  class="float-end btn btn-light btn-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <strong class="price">$<?php echo e(number_format($advertisement->price, 0, ',', '.')); ?></strong> <!-- price.// -->
                                <a href="<?php echo e(route('advertisement.view', $advertisement->id)); ?>" class="title text-truncate"><?php echo e($advertisement->title); ?></a>
                                <small class="text-muted"><?php echo e($advertisement->created_at); ?> — <strong><?php echo e($advertisement->user->name); ?></strong></small>
                            </figcaption>
                        </figure>
                    </div> <!-- col end.// -->
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div> <!-- row end.// -->
        <?php echo e($advertisements->links()); ?>

    </div> <!-- container end.// -->
</section>

</body>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/advertisement/search_result.blade.php ENDPATH**/ ?>