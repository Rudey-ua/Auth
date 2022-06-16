<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <h3 class="mt-4">Избранные объявления</h3>
</div>

<div class="container">
    <div class= "row d-inline-flex">
        <?php $__currentLoopData = $favourites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favourite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $favourite->advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class ="col-12 col-sm-6 col-md-3 p-2">
                    <div class="card h-100">
                        <a href="<?php echo e(route('advertisement.view', $advertisement['id'])); ?>">
                            <img class="card-img-top pt-2 pr-2 pl-2" src="<?php echo e($advertisement->photos->first()['img_src']); ?>" alt="Card image cap">
                        </a>
                        <div class="card-body mb-0 pb-0">
                            <a style="color: black" href="<?php echo e(route('advertisement.view', $advertisement['id'])); ?>">
                                <h5 class="card-title"><?php echo e($advertisement['title']); ?></h5>
                            </a>
                            <p class="card-text"><small class="text-muted"><?php echo e($advertisement['created_at']); ?></small></p>
                            <span class="card-text"><strong><?php echo e($advertisement['price']); ?> грн.</strong></span>

                            <form method="post" class="mt-1" action="<?php echo e(route('favourite.delete')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($favourite['id']); ?>">
                                <button style="background-color: white; border-width: 1px" type="submit">
                                    Убрать из избранного
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH C:\OpenServer\domains\auth.com\resources\views/advertisement/favourite.blade.php ENDPATH**/ ?>