<div>
    <div class="row mb-3 my-3">
        <div class="d-flex justify-content-between">
            <div>
                <span>
                    <i class="fa fa-light fa-users"></i>
                    <strong><?php echo e(count($bids)); ?> bids</strong>
                    <?php if(count($bids) != 0): ?>
                        , lider <strong><?php echo e($bids->last()->user()->login); ?></strong>
                    <?php endif; ?>
                </span>
            </div>

            <div>
                <span>
                    <i class="fa fa-regular fa-clock"></i>
                    <?php
                        $date = new DateTime(date('Y-m-d H:i:s'));
                        $date->add(new DateInterval('PT3H'));
                        $diff = $date->diff(new DateTime($ad->time));
                    ?>
                    <strong>
                    <?php echo e($diff->format('%H год. %i хв.')); ?>

                    </strong>(<?php echo e($ad->time); ?>)
                </span>
            </div>
        </div>

    </div>
    <hr>
    <div class="row mb-4">

        <div class="col">
            <div class="price mb-4 mt-2">
                Last bid:
                <strong class="text-danger"><?php echo e($bids->last()->price); ?>$</strong>
            </div>
            <?php if($bids->last()->price < $ad->price * 0.6): ?>
                <div>
                    Buy now:
                    <strong class="text-danger"><?php echo e($ad->price); ?>$</strong>
                </div>
            <?php endif; ?>
        </div>

        <div class="col">
            <div class="input-group">
                <input type="number" value="<?php echo e($bids->last()->price + $ad->min_bid); ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>

        <div class="col">
            <div class="row mb-2 ml-2 mr-2 pl-2">
                <button class="btn btn-primary">Зробити ставку</button>
            </div>
            <?php if($bids->last()->price < $ad->price * 0.6): ?>
                <div class="row">
                    <button class="btn btn-danger">Купити зараз</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/advertisement/inc/auction.blade.php ENDPATH**/ ?>