<article class="filter-group">
    <header class="card-header">
        <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside1">
            <i class="icon-control fa fa-chevron-down"></i>
            Ціна
        </a>
    </header>
    <div class="collapse show" id="collapse_aside1">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="min" class="form-label">Min</label>
                    <input class="form-control" name="min" value="0" id="min" placeholder="$0" type="number">
                </div> <!-- col end.// -->

                <div class="col-6">
                    <label for="max" class="form-label">Max</label>
                    <input class="form-control" name="max" value="9999999" id="max" placeholder="$1,0000" type="number">
                </div> <!-- col end.// -->
            </div> <!-- row end.// -->

        </div> <!-- card-body.// -->
    </div>
</article> <!-- filter-group // -->

<article class="filter-group">
    <header class="card-header">
        <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside2">
            <i class="icon-control fa fa-chevron-down"></i>
            Тип двигуна
        </a>
    </header>
    <div class="collapse show" id="collapse_aside2">
        <div class="card-body">
            <label class="form-check mb-2">
                <input class="form-check-input" value="gasoline" type="checkbox" name="engine_type[]">
                <span class="form-check-label"> Бензиновий </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="diesel" type="checkbox" name="engine_type[]">
                <span class="form-check-label"> Дизельний </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="electric" type="checkbox" name="engine_type[]">
                <span class="form-check-label"> Електричний </span>
            </label>
        </div> <!-- card-body.// -->
    </div>
</article>  <!-- filter-group // -->

<article class="filter-group">
    <header class="card-header">
        <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside5">
            <i class="icon-control fa fa-chevron-down"></i>
            Тип кузова
        </a>
    </header>
    <div class="collapse show" id="collapse_aside5">
        <div class="card-body">
            <label class="form-check mb-2">
                <input class="form-check-input" value="van" type="checkbox" name="body_type[]">
                <span class="form-check-label"> Фургон </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="dump" type="checkbox" name="body_type[]">
                <span class="form-check-label"> Самоскид </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="timber" type="checkbox" name="body_type[]">
                <span class="form-check-label"> Лісовоз </span>
            </label>
        </div> <!-- card-body.// -->
    </div>
</article>  <!-- filter-group // -->


<article class="filter-group">
    <header class="card-header">
        <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside3">
            <i class="icon-control fa fa-chevron-down"></i>
            Стан
        </a>
    </header>
    <div class="collapse show" id="collapse_aside3">
        <div class="card-body">
            <label class="form-check mb-2">
                <input class="form-check-input" value="new" type="checkbox" name="type[]">
                <span class="form-check-label"> Нове </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="used" type="checkbox" name="type[]">
                <span class="form-check-label"> Вживане  </span>
            </label>
        </div> <!-- card-body.// -->
    </div>
</article>  <!-- filter-group // -->

<article class="filter-group">
    <header class="card-header">
        <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside4">
            <i class="icon-control fa fa-chevron-down"></i>
            Коробка передач
        </a>
    </header>
    <div class="collapse" id="collapse_aside4">
        <div class="card-body">
            <label class="form-check mb-2">
                <input class="form-check-input" value="mechanical" type="checkbox" name="transmission[]">
                <span class="form-check-label"> Механічна </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="automatic" type="checkbox" name="transmission[]">
                <span class="form-check-label"> Автоматична  </span>
            </label>
        </div> <!-- card-body.// -->
    </div>
</article>  <!-- filter-group // -->

<article class="filter-group">
    <header class="card-header">
        <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside4">
            <i class="icon-control fa fa-chevron-down"></i>
            Тип приводу
        </a>
    </header>
    <div class="collapse" id="collapse_aside4">
        <div class="card-body">
            <label class="form-check mb-2">
                <input class="form-check-input" value="full" type="checkbox" name="type_of_drive[]">
                <span class="form-check-label"> Повний </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="rear" type="checkbox" name="type_of_drive[]">
                <span class="form-check-label"> Задній  </span>
            </label>

            <label class="form-check mb-2">
                <input class="form-check-input" value="front" type="checkbox" name="type_of_drive[]">
                <span class="form-check-label"> Передній  </span>
            </label>
        </div> <!-- card-body.// -->
    </div>
</article>  <!-- filter-group // -->
<?php /**PATH C:\OpenServer\domains\dev-slando.com\resources\views/includes/filters/trucks.blade.php ENDPATH**/ ?>