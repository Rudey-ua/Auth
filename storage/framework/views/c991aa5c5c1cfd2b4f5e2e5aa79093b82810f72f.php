<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="section-intro padding-y-lg" style="padding-top: 50px; padding-bottom: 50px; background-color: #FFCE30">
    <div class="container">

        <article class="my-5">
            <h1 class="display-4 text-black"> Slando — платформа, яка об'єднує людей</h1>
        </article>

    </div> <!-- container end.// -->
</section>

<div class="container mt-4">
    <form action="<?php echo e(route('advertisement.search_result')); ?>" method="GET">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-10">
                <div class="input-group mb-3">
                    <input required name="title" type="text" class="form-control form-control-lg" placeholder="Шукайте, що потрібно">
                    <button type="submit" class="input-group-text btn-success"><i class="bi bi-search"></i>Знайти</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="card mt-2">
        <div class="content-body">
            <nav class="row gy-4">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->parent_id == null): ?>
                        <div class="col-xl col-lg-2 col-md-3 col-4">
                            <a href="#" class="item-link text-center" id="dropdownMenuLink" data-bs-toggle="dropdown">
                                  <span class="icon icon-lg mb-2 rounded-3">
                                    <img width="42" height="42" src="<?php echo e($category->img_src); ?>" alt="img_src">
                                  </span>
                                <span class="text"> <?php echo e($category->title); ?> </span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php $__currentLoopData = $category->getSubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="dropdown-item" href="/filter/?category_id=<?php echo e($item->id); ?>"><?php echo e($item->title); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div> <!-- col.// -->
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>
        </div> <!-- card-body.// -->
    </div> <!-- card.// -->
</div>

<!-- ================ SECTION PRODUCTS ================ -->
<section class="padding-y">
    <div class="container">

        <header class="section-heading">
            <h3 class="section-title">VIP-оголошення</h3>
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

    </div> <!-- container end.// -->
</section>
<!-- ================ SECTION PRODUCTS END.// ================ -->

<?php echo $__env->make('includes.user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

<script>
    sessionStorage.clear()
</script>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/home.blade.php ENDPATH**/ ?>