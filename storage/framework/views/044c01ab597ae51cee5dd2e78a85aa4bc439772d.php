<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-4">
    <div class="mt-2 mb-3">
        <a style="text-decoration: none; color:black" href="<?php echo e(route('profile')); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>

    <h3 class="mb-4">Мои заказы</h3>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Views</th>
                <th>Price</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $advertisement_id = $purchase['advertisement_id'];
                    $advertisement = \App\Models\Advertisement::where('id', $advertisement_id)->get()
                ?>

                <?php $__currentLoopData = $advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($ad['id']); ?></td>
                        <td><?php echo e($ad['title']); ?></td>
                        <td><?php echo e($ad->category['title']); ?></td>
                        <td><?php echo e($ad['created_at']->format('m.d.Y')); ?></td>
                        <td><?php echo e($ad['views']); ?></td>
                        <td><?php echo e($ad['price']); ?></td>
                        <td><a style="margin-left: 10px" href="/advertisement/<?php echo e($ad['id']); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/72/72647.png" alt=""></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

</body>




<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/purchases.blade.php ENDPATH**/ ?>