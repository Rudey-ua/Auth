<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<!--Navbar-->

<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--End-Navbar-->


<div class="container rounded bg-white mb-4">
    <div class="mt-2">
        <a style="text-decoration: none; color:black" href="<?php echo e(URL::previous()); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>


    <div class="row">
        <div class="col-md-5 border-right">
            <form action="/profile/update/image" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($user['id']); ?>">
                <div class="d-flex flex-column align-items-center text-center p-3 py-2">
                    <?php if($user['img_src'] == null): ?>
                        <img class="rounded-3 mt-5" width="200px" src="<?php echo e(asset('storage/images/default_user_image.png')); ?>" alt="user_img">
                    <?php else: ?>
                        <img class="rounded-3 mt-5" width="200px" src="<?php echo e($user['img_src']); ?>" alt="user_img">
                    <?php endif; ?>
                    <span class="font-weight-bold"><?php echo e($user['name']); ?></span>
                    <span class="text-black-50"><?php echo e($user['email']); ?></span>

                    <div class="mt-2 mb-2 col-md-6">
                        <input required name="image" class="form-control" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-success col-md-6 mt-2">Изменить аватар</button>
                    <a class="mt-3 mb-3 btn btn-success col-md-6" href="<?php echo e(route('purchases')); ?>">Мои заказы</a>

                </div>
            </form>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Настройки аккаунта</h4>
                </div>

                <form action="/profile/update" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row mt-3">
                        <input type="hidden" name="id" value="<?php echo e($user['id']); ?>">
                        <div class="col-md-12">
                            <label class="labels">Контактное лицо</label>
                            <input required class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" class="form-control" placeholder="first name" value="<?php echo e($user['name']); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <p style="margin-bottom: 0px"><?php echo e($message); ?></p>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="labels">Email</label><input required class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="email" class="form-control" placeholder="enter email id" value="<?php echo e($user['email']); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                    <p style="margin-bottom: 0px"><?php echo e($message); ?></p>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label class="labels">День рождения</label>
                            <input id="dob" type="date" name="dob" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob" value="<?php echo e($user['dob']); ?>" required autocomplete="dob">
                            <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <p style="margin-bottom: 0px"><?php echo e($message); ?></p>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <button  class="btn btn-primary profile-button mt-4" type="submit">Save Profile</button>
                </form>


            <?php if(Session::has('success_message')): ?>
                    <div class="alert alert-success mt-4">
                        <strong>Success!</strong> Изменения были успешно применены
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/profile.blade.php ENDPATH**/ ?>
