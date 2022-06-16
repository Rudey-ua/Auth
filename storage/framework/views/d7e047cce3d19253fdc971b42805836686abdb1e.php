<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

<div class="container mt-4">
    <div class="mb-3">
        <a style="text-decoration: none; color:black" href="<?php echo e(URL::previous()); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>
    <div class= "row d-inline-flex">
        <h3><?php echo e($category->first()['title']); ?></h3>
        <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class ="col-12 col-sm-6 col-md-3 p-2">
                <div class="card h-100">
                    <a href="<?php echo e(route('advertisement.view', $advertisement['id'])); ?>">
                        <img class="card-img-top pt-2 pr-2 pl-2" src="<?php echo e(asset($advertisement->photos->first()['img_src'])); ?>" alt="Card image cap">
                    </a>
                    <div class="card-body mb-0 pb-0">
                        <a style="color: black" href="<?php echo e(route('advertisement.view', $advertisement['id'])); ?>">
                            <h5 class="card-title"><?php echo e($advertisement['title']); ?></h5>
                        </a>
                        <p class="card-text"><small class="text-muted"><?php echo e($advertisement['created_at']); ?></small></p>
                        <span class="card-text"><strong><?php echo e($advertisement['price']); ?> грн.</strong></span>
                        <p style="font-size: 13px; margin-bottom: 0; margin-top: 5px;">Пользователь - <strong><?php echo e($advertisement->user['name']); ?></strong></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

</body>
<?php /**PATH C:\OpenServer\domains\auth.com\resources\views/advertisement/category.blade.php ENDPATH**/ ?>