<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

<div class="container mt-4">

    <h2 style="text-align: center">Главные рубрики</h2>

        <div style="margin-left: 70px" class="col-md-12">
            <ul class="list-group list-group-horizontal">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="mt-4" style="text-decoration: none" href="/category/<?php echo e($category['id']); ?>">
                        <li class="list-group-item">
                            <?php echo e($category['title']); ?>

                        </li>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>


    <h2 class="mt-4 mb-4" style="text-align: center">VIP-объявления</h2>

    <div class= "row d-inline-flex">
        <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($advertisement['is_vip']): ?>
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
                            <p style="font-size: 13px; margin-bottom: 0; margin-top: 5px;">Пользователь - <strong><?php echo e($advertisement->user['name']); ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>

</body>


<?php /**PATH C:\OpenServer\domains\auth.com\resources\views/home.blade.php ENDPATH**/ ?>