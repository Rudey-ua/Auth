<form action="<?php echo e(route('charge')); ?>" method="post">
    <input type="text" name="amount" />
    <?php echo e(csrf_field()); ?>

    <input type="submit" name="submit" value="Pay Now">
</form>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/payment.blade.php ENDPATH**/ ?>