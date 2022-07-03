<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <h3 class="mt-4">Редактировать объявление</h3>
</div>

<div class="container">
    <form method="POST" action="<?php echo e(route('admin.advertisement.update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" value="<?php echo e($advertisement['id']); ?>" name="id">
        <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">
            <div class="card-body">
            <div class="form-group">
                <label>Укажите название</label>
                <input value="<?php echo e($advertisement['title']); ?>" required name="title" type="text" class="form-control" style="width:50%;height: 50px;font-size: 18px;" placeholder="Например, iPhone 8">
            </div>
            <div class="form-group">
                <label>Категория</label><br>
                <input readonly value="<?php echo e($advertisement->category['title']); ?>" required name="price" type="text" class="form-control" style="width:30%;height:50px;font-size: 18px;">
            </div>

            <div class="form-group">
                <label>Описание</label>
                <textarea required name="description" class="form-control" style="width:70%" rows="3" placeholder="Подумайте, какие подробности вы хотели бы узнать из объявления. И добавьте их в описание">
                    <?php echo e($advertisement['description']); ?>

                </textarea>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input value="<?php echo e($advertisement['price']); ?>" required name="price" type="text" class="form-control" style="width:30%;height:50px;font-size: 18px;">
            </div>

            <div class="form-group" style="width: 30%">
                <div class="custom-file">
                    <input type="file" multiple name="images[]" class="custom-file-input" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Редактировать</button>
        </div>
        </div>
    </form>
</div>

</body>
</html>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/admin/users/admin_update.blade.php ENDPATH**/ ?>