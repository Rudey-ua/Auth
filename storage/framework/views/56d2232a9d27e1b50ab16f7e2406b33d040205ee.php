<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Slando</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <div class="navbar-nav ms-auto">

                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                        <a style="text-decoration: none; color: white" href="<?php echo e(route('admin.index')); ?>">
                                <button style="margin-right: 10px;" class="btn btn-dark" type="button"  aria-expanded="false">
                                    Admin
                                </button>
                            </a>
                    <?php endif; ?>

                    <div class="dropdown">

                        <?php if(auth()->guard()->check()): ?>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo e(\Illuminate\Support\Facades\Auth::user()['name']); ?>

                            </button>
                        <?php endif; ?>

                        <?php if(auth()->guard()->guest()): ?>
                                <a style="text-decoration: none; color: black" href="/login">
                                    <strong>
                                        Войти
                                    </strong>
                                </a>
                        <?php endif; ?>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>">Профиль</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('advertisement.store')); ?>">Добавить объяву</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('advertisement.showAll')); ?>">Все объявления</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('favourites.show')); ?>">Избранные</a></li>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Выйти')); ?>

                                </a>
                            </li>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



<?php /**PATH C:\OpenServer\domains\auth.com\resources\views////includes/user/navbar.blade.php ENDPATH**/ ?>