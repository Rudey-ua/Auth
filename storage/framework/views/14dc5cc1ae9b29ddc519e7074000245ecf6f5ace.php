<div class="mb-3">
    <label class="form-label">Тип двигуна</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="engine_type" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Обрати</option>
        <option value="gasoline">Бензиновий</option>
        <option value="diesel">Дизельний</option>
        <option value="electric">Електричний</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Стан</label>
    <select required style="width: 50%;height: 50px; font-size: 16px" name="type" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Обрати</option>
        <option value="new">Нове</option>
        <option value="used">Вживане</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Коробка передач</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="transmission" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Обрати</option>
        <option value="mechanical">Механічна</option>
        <option value="automatic">Автоматична</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Тип приводу</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="type_of_drive" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Обрати</option>
        <option value="full">Повний</option>
        <option value="rear">Задній</option>
        <option value="front">Передній</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Тип кузова</label>
    <select required style="width:50%;height: 50px; font-size: 16px" name="body_type" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Обрати</option>
        <option value="van">Фургон</option>
        <option value="dump">Самоскид</option>
        <option value="timber">Лісовоз</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Год выпуска</label>
    <input required name="year_of_issue" style="width: 50%;height: 50px; font-size: 16px" min="1930" max="2022" type="number" class="form-control" placeholder="1930-2022 г.">
</div>





<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/categories/vehicles/trucks.blade.php ENDPATH**/ ?>