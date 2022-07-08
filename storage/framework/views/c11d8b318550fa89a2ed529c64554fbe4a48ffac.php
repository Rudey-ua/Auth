<div>
    <div class="row mb-3 my-3">
        <div class="d-flex justify-content-between">
            <div>
                <span>
                    <i class="fa fa-light fa-users"></i>
                    <strong id="count"><?php echo e(count($bids)); ?> bids</strong>
                    <?php if(count($bids) != 0): ?>
                        , lider <strong id="login"><?php echo e($bids->last()->user()->login); ?></strong>
                    <?php endif; ?>
                </span>
            </div>

            <div>
                <span>
                    <i class="fa fa-regular fa-clock"></i>
                    
                    (<?php echo e($ad->time); ?>)
                </span>
            </div>
        </div>

    </div>
    <hr>
    <div class="row mb-4">

        <div class="col">
            <div class="price mb-4 mt-2">
                Last bid:
                <strong class="text-danger" id="last_bid"><?php echo e($bids->last()->price); ?>$</strong>
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
                <input type="number" id='price' value="<?php echo e($bids->last()->price + $ad->min_bid); ?>"
                    class="form-control" aria-label="Amount (to the nearest dollar)">
            </div>
        </div>

        <div class="col">
            <?php if(auth()->guard()->check()): ?>
                <div class="row mb-2 ml-2 mr-2 pl-2">
                    <button class="btn btn-primary make-bid">Зробити ставку</button>
                </div>
                <?php if($bids->last()->price < $ad->price * 0.6): ?>
                    <div class="row">
                        <button class="btn btn-danger">Купити зараз</button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <div class="row mb-2 ml-2 mr-2 pl-2">
                    <a href="/login">
                        <button class="btn btn-primary">Зробити ставку</button>
                    </a>
                </div>
                <?php if($bids->last()->price < $ad->price * 0.6): ?>
                    <div class="row">
                        <a href="/login">
                            <button class="btn btn-danger">Купити зараз</button>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.make-bid').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/api/makebid',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                },
                data: {
                    price: $('#price').val(),
                    ad_id: $('#id').text(),
                    uid: "<?php echo e(Auth::user()->id); ?>"
                },
                success: function(res) {
                    $('#last_bid').text($('#price').val());
                    $('#price').val(res.price);
                    $('#count').text(res.count);
                    $('#login').text(res.login);
                },
                error: function(jqXHR, exception){
                    console.log(jqXHR);
                    console.log(exception);
                }

            });
        });
    });
</script>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/advertisement/inc/auction.blade.php ENDPATH**/ ?>