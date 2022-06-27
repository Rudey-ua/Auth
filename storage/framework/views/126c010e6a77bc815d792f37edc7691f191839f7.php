<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <div class="mt-4">
        <a style="text-decoration: none; color:black" href="<?php echo e(route('home')); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>
    <h3 class="mt-3">Редактировать объявление</h3>
</div>

<div class="container">
    <form method="POST" action="<?php echo e(route('advertisement.update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" value="">
        <input type="hidden" value="<?php echo e($advertisement['id']); ?>" name="id">
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
                <textarea required name="description" class="form-control" style="width:70%" rows="6" placeholder="Подумайте, какие подробности вы хотели бы узнать из объявления. И добавьте их в описание">
                    <?php echo e($advertisement['description']); ?>

                </textarea>
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input value="<?php echo e($advertisement['price']); ?>" required name="price" type="text" class="form-control" style="width:30%;height:50px;font-size: 18px;">
            </div>

                <div id="result">
                    <div class="result 1">
                <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                        <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                        <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                        <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    </div>
                    <div class="result 2">
                <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                        <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                        <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                        <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    </div>
                </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Редактировать</button>
        </div>
        </div>
    </form>
</div>


'
<script src="<?php echo e(asset('js/script.js')); ?>"></script>

<script>
    var images = JSON.parse('<?php echo $advertisement->photos ?>');
    render(images)
</script>



</body>
</html>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/advertisement/update.blade.php ENDPATH**/ ?>