<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">

    <div class="mt-4">
        <a style="text-decoration: none; color:black" href="<?php echo e(route('admin.user.index')); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>

    <h4 class="mt-4">
        Объявления пользователя - <?php echo e($user['name']); ?>

    </h4>
    <p class="mb-4">Login -
        <strong>
            <?php echo e($user['login']); ?>

        </strong>
    </p>

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
                <th>Update</th>
                <th>Delete</th>
                <th>View</th>
                <th>Moderation</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($ad['id']); ?></td>
                    <td><?php echo e($ad['title']); ?></td>
                    <td><?php echo e($ad->category['title']); ?></td>
                    <td><?php echo e($ad['created_at']->format('m.d.Y')); ?></td>
                    <td><?php echo e($ad['views']); ?></td>
                    <td><?php echo e($ad['price']); ?></td>
                    <td><form style="margin-left: 10px" method="POST" action="<?php echo e(route('admin.advertisement.updatePage')); ?>">
                            <?php echo csrf_field(); ?>
                            <input name="id" type="hidden" value="<?php echo e($ad['id']); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($user['id']); ?>">
                            <button style="border: 0; background-color: white"  type="submit">
                                <img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_76537.png" alt="">
                            </button>
                        </form></td>
                    <td><form style="margin-left: 10px" method="POST" action="<?php echo e(route('admin.advertisement.destroy')); ?>">
                            <?php echo csrf_field(); ?>
                            <input name="id" type="hidden" value="<?php echo e($ad['id']); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($user['id']); ?>">
                            <button style="border: 0; background-color: white"  type="submit">
                                <img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_215128.png" alt="">
                            </button>
                        </form></td>

                    <td>
                        <a href="/admin/user/<?php echo e($user['id']); ?>/advertisement/<?php echo e($ad['id']); ?>">
                            <img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/72/72647.png" alt="">
                        </a>
                    </td>
                    <?php if($ad['checked']): ?>
                        <td><strong style="color: green;">Одобрено</strong></td>
                    <?php else: ?>
                        <td><strong style="color: red;">Не одобрено</strong></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

</body>

<?php /**PATH C:\OpenServer\domains\auth.com\resources\views/admin/users/advertisements.blade.php ENDPATH**/ ?>