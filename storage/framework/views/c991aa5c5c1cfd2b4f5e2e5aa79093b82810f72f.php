<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-4">

    <form action="<?php echo e(route('advertisement.search_result')); ?>" method="GET">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <input required name="title" type="text" class="form-control form-control-lg" placeholder="Search Here">
                    <button type="submit" class="input-group-text btn-success"><i class="bi bi-search"></i>Search</button>
                </div>
            </div>
        </div>
    </form>

    <h2 style="text-align: center" class="mb-4">Главные рубрики</h2>

    <div class="container" style="margin-left: 50px">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="dropdown" style="display: inline-block;">
                <?php if($category->parent_id == null): ?>
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo e($category['title']); ?>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php $__currentLoopData = $category->getSubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a class="dropdown-item" href="/category/<?php echo e($item->id); ?>"><?php echo e($item->title); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <h2 class="mt-4 mb-4" style="text-align: center">VIP-объявления</h2>

    <div class= "row d-inline-flex">
        <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($advertisement['is_vip']): ?>
                <div class ="col-12 col-sm-6 col-md-3 p-2">
                    <div class="card h-100">
                        <a href="<?php echo e(route('advertisement.view', $advertisement['id'])); ?>">
                            <?php if(count($advertisement->photos) > 0): ?>
                                <img class="card-img-top pt-2 pr-2 pl-2" src="<?php echo e(asset($advertisement->photos->first()['img_src'])); ?>" alt="Card image cap">
                            <?php elseif(count($advertisement->photos) == 0): ?>
                                <img class="card-img-top pt-2 pr-2 pl-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAACuCAMAAAClZfCTAAAAP1BMVEXe3t6Ih4eVlJSEg4Pi4uLb29uwsLDj4+OpqKiBgICkpKSbm5vc3Nyrq6vV1dWLioq5ubnPz8/FxMS4t7eRkZHFYcZPAAABl0lEQVR4nO3ayY6qQBiAUaAKZHRoff9nvQzSDlHYdEJyOWehRF2QL78lpkgSAAAAAAAAAAAAAAAAAAAAAAAAAPh78bAibn2GWzt22YrysvNIt7AqPW59kluK53Cqy2Wn0O15jGIRsjYuOjSh3vo0tzQkyofntv02KVGiMdG5aYr2y0ckGhLVVZqGU/75IxJlefwJaS8UT9+1x6FEQ6JuTJQ2T29cj3MkiYZExXuiQ1dl8/ot0ZDoMhaqzr+D049VyO5zJNG4XF/T/iL6EWKcqtBMjSSafvQvXffz9No4VdM7Es2Xjr37S4f74t03uuVRojnReDw9nudC6bQeSfSbqC3GcTqnT/r1SKJHorJq8nh4KdQ3qqNEc6J6+J3Pr+E1UdpINCeqxza39J1Ec6LyfXokmt0TldWXQhK9/keT6JOXf/oSfSLRqilRWX2VSTQu1/kCV9d9osQm0ZJ4DaeuWLbzrcakPa1vWIddb1gn8VKv3fZQ7/22hyQuLdaDuPdCAAAAAAAAAAAAAAAAAAAAAAAAAAD8t/4Bx0ESOBoYNLUAAAAASUVORK5CYII=" alt="Card image cap">
                            <?php endif; ?>
                        </a>
                        <div class="card-body mb-0 pb-0">
                            <a style="color: black" href="<?php echo e(route('advertisement.view', $advertisement['id'])); ?>">
                                <h5 class="card-title"><?php echo e($advertisement['title']); ?></h5>
                            </a>
                            <p class="card-text"><small class="text-muted"><?php echo e($advertisement['created_at']); ?></small></p>
                            <span class="card-text"><strong><?php echo e(number_format($advertisement['price'], 0, ',', '.')); ?> грн.</strong></span>
                            <p style="font-size: 13px; margin-bottom: 0; margin-top: 5px;">Пользователь - <strong><?php echo e($advertisement->user['name']); ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>

</body>


<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/home.blade.php ENDPATH**/ ?>