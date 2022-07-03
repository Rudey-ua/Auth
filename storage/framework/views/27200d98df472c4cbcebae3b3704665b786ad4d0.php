<form action="<?php echo e(route('filter', $category->first()->id)); ?>" method="GET">

    <input type="hidden" name="category_id" value="<?php echo e($category->first()->id); ?>">

    <div class="mt-3 mb-3">
        <label>Тип двигателя</label><br>
        <input type="checkbox" value="Бензиновый" name="engine_type[]"/> Бензиновый<br>
        <input type="checkbox" value="Дизельный" name="engine_type[]"/> Дизельный<br>
        <input type="checkbox" value="Электрический" name="engine_type[]"/> Электрический<br>
    </div>

    <div class="mt-3 mb-3">
        <label>Цена</label><br>
        <input class="mb-1" type="number" value="0" placeholder="от" name="from"/><br>
        <input class="mb-1" type="number" value="<?php echo e($advertisements->max('price')); ?>" placeholder="от" name="to"/><br>
    </div>

     <div class="mt-3 mb-3">
        <label>Состояние</label><br>
        <input type="checkbox" value="new" name="type[]"/> Новый<br>
        <input type="checkbox" value="used" name="type[]"/> Б/У<br>
    </div>

    <div class="mt-3 mb-3">
        <label>Коробка передач</label><br>
        <input type="checkbox" value="Механическая" name="transmission[]"/> Механическая<br>
        <input type="checkbox" value="Автоматическая" name="transmission[]"/> Автоматическая<br>
    </div>

    <div class="mt-3 mb-3">
        <label>Тип привода</label><br>
        <input type="checkbox" value="Полный" name="type_of_drive[]"/> Полный<br>
        <input type="checkbox" value="Задний" name="type_of_drive[]"/> Задний<br>
        <input type="checkbox" value="Передний" name="type_of_drive[]"/> Передний<br>
    </div>

    <div class="mt-3 mb-3">
        <label>Цвет</label><br>
        <input type="checkbox" value="Белый<" name="color[]"/> Белый<br>
        <input type="checkbox" value="Черный" name="color[]"/> Черный<br>
        <input type="checkbox" value="Синий" name="color[]"/> Синий<br>
        <input type="checkbox" value="Красный" name="color[]"/> Красный<br>
    </div>

    <div class="mt-3 mb-3">
        <label>Колличество мест</label><br>
        <input type="checkbox" value="2" name="seats[]"/> Два<br>
        <input type="checkbox" value="3" name="seats[]"/> Три<br>
        <input type="checkbox" value="4" name="seats[]"/> Четыре<br>
        <input type="checkbox" value="5" name="seats[]"/> Пять<br>
        <input type="checkbox" value="6" name="seats[]"/> Шесть<br>
    </div>

    <button class="btn btn-success" type="submit">Фильтровать</button>
</form>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/includes/filters/cars.blade.php ENDPATH**/ ?>