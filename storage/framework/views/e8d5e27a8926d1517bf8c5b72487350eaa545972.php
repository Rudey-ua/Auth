<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="padding-y bg-light">
    <div class="container">
        <div class="row">
            <main class="col-lg-9">

                <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">

                    <?php if(count($advertisements) > 1): ?>
                        <strong class="d-block py-2"><?php echo e(count($advertisements)); ?> Items found </strong>
                    <?php elseif(count($advertisements) <= 1): ?>
                        <strong class="d-block py-2"><?php echo e(count($advertisements)); ?> Item found </strong>
                    <?php endif; ?>

                    <div class="ms-auto">
                        <select class="form-select d-inline-block w-auto">
                            <option value="0">Best match</option>
                            <option value="1">Recommended</option>
                            <option value="2">High rated</option>
                            <option value="3">Randomly</option>
                        </select>
                    </div>
                </header>


            <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php $statement = \App\Models\Favourite::where('advertisement_id', $advertisement->id)
                        ->where('user_id', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())
                        ->get() ?>
                    <?php endif; ?>

                    <article class="card card-product-list">
                    <div class="row g-0">
                        <aside class="col-xl-3 col-md-4">
                            <?php if(count($advertisement->photos) > 0): ?>
                                <a href="#" class="img-wrap"> <img src="<?php echo e(asset($advertisement->photos->first()['img_src'])); ?>"> </a>
                            <?php elseif(count($advertisement->photos) == 0): ?>
                                <a href="#" class="img-wrap"> <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640"> </a>
                            <?php endif; ?>
                        </aside> <!-- col.// -->
                        <div class="col-xl-9 col-md-8 border-start">
                            <div class="card-body">
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
                                    <a href="#" class="title mb-2"><?php echo e($advertisement->title); ?></a>
                                <div class="price-wrap me-3">
                                    <span class="price h5"> $<?php echo e(number_format($advertisement->price, 0, ',', '.')); ?> </span>
                                    <del class="price-old"> $<?php echo e(number_format($advertisement->price + rand($advertisement->price/10, $advertisement->price/8), 0, ',', '.')); ?> </del>
                                </div> <!-- price-dewrap // -->

                                <p style="font-size: 13px;margin-top:5px;"><?php echo e($advertisement->created_at); ?></p>

                                <hr style="margin-top: 10px; margin-bottom: 8px">

                                <p class="text-muted mb-2"><?php echo e(mb_strimwidth($advertisement->description, 0, 140, "...")); ?></p>
                                <a href="<?php echo e(route('advertisement.view', $advertisement->id)); ?>">Details</a>
                            </div> <!-- card-body .// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </main>

            <aside class="col-lg-3 col-sm-6 d-none d-lg-block">

                <!-- COMPONENTS SIDEBAR -->
                <form method="GET" action="<?php echo e(route('filter')); ?>">
                    <div class="card">
                        <input type="hidden" name="category_id" value="<?php echo $_GET['category_id'] ?>">

                        <?php switch(app('request')->input('category_id')):
                            case (9): ?>
                                <?php echo $__env->make('includes.filters.cars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>;

                            <?php case (10): ?>
                                <?php echo $__env->make('includes.filters.trucks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>;

                            <?php case (12): ?>
                                <?php echo $__env->make('includes.filters.flats', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>;
                        <?php endswitch; ?>

                    <button class="btn btn-light w-100" type="submit">Apply</button>
                    <button class="btn btn-light w-100" id="reset" type="submit">Reset</button>

                    </div> <!-- card.// -->

                </form>
                <!-- ============= COMPONENTS SIDEBAR END .// ============= -->
            </aside>
        </div>
        <?php echo e($advertisements->links()); ?>

    </div>
</section>

<script src="<?php echo e(asset('js/saveLocal.js')); ?>"></script>


</body>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/advertisement/filter.blade.php ENDPATH**/ ?>