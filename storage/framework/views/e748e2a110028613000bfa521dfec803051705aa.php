<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

<div class="container mt-4">

    <h2 style="text-align: center">Главные рубрики</h2>

    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span style="font-size: 24px">
            <a href="/category/<?php echo e($category['id']); ?>"><?php echo e($category['title']); ?></a>
        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <h2 class="mt-4 mb-4" style="text-align: center">VIP-объявления</h2>

    <div class= "row d-inline-flex">
        <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class ="col-12 col-sm-6 col-md-3 p-2">
                <div class="card h-100">
                    <img class="card-img-top pt-2 pr-2 pl-2" src="" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($advertisement['title']); ?></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted"><?php echo e($advertisement['created_at']); ?></small></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


</body>


<?php /**PATH C:\OpenServer\domains\auth.com\resources\views/home.blade.php ENDPATH**/ ?>