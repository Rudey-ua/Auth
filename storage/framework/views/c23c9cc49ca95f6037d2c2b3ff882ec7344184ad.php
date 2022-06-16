<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

<div class="container">

</div>

<div class="container mt-4">
    <h3 class="mb-4">Все объявления</h3>
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
                <th>Updade</th>
                <th>Delete</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($ad['id']); ?></td>
                    <td><?php echo e($ad['title']); ?></td>
                    <td><?php echo e($ad->category['title']); ?></td>
                    <td><?php echo e($ad['created_at']->format('m.d.Y')); ?></td>
                    <td><?php echo e($ad['views']); ?></td>
                    <td><?php echo e($ad['price']); ?></td>
                        <td><a href=""><img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_76537.png" alt=""></a></td>
                    <td><a href=""><img style="width: 20px;" src="http://cdn.onlinewebfonts.com/svg/img_215128.png" alt=""></a></td>
                    <td><a href="/advertisement/<?php echo e($ad['id']); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/72/72647.png" alt=""></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
</div>




</body>

</html>



<?php /**PATH C:\OpenServer\domains\auth.com\resources\views/advertisement/show.blade.php ENDPATH**/ ?>