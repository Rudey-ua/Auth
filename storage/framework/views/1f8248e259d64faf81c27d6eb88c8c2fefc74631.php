<div class="mb-3">
    <label class="form-label">Тип двигателя</label>

    <select style="width: 50%;height: 50px; font-size: 16px" name="engine_type" class="form-select" aria-label="Default select example">
        <option selected disabled>Выбрать</option>
        <option value="Бензиновый">Бензиновый</option>
        <option value="Дизельный">Дизельный</option>
        <option value="Электрический">Электрический</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Мощность двигателя</label>
    <input style="width: 50%;height: 50px; font-size: 16px" name="engine_power" type="number" min="0" max="2000" class="form-control" placeholder="л.с">
</div>

<div class="mb-3">
    <label class="form-label">Объем двигателя</label>
    <input style="width: 50%;height: 50px; font-size: 16px" name="engine_volume" type="number" min="0" class="form-control" placeholder="см^3">
</div>

<div class="mb-3">
    <label class="form-label">Состояние</label>
    <select style="width: 50%;height: 50px; font-size: 16px" name="type" class="form-select" aria-label="Default select example">
        <option selected disabled>Выбрать</option>
        <option value="Новый">Новый</option>
        <option value="Б/У">Б/У</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Коробка передач</label>

    <select style="width: 50%;height: 50px; font-size: 16px" name="transmission" class="form-select" aria-label="Default select example">
        <option selected disabled>Выбрать</option>
        <option value="Механическая">Механическая</option>
        <option value="Автоматическая">Автоматическая</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Тип привода</label>

    <select style="width: 50%;height: 50px; font-size: 16px" name="type_of_drive" class="form-select" aria-label="Default select example">
        <option selected disabled>Выбрать</option>
        <option value="Полный">Полный</option>
        <option value="Задний">Задний</option>
        <option value="Передний">Передний</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Пробег</label>
    <input name="car_mileage" style="width: 50%;height: 50px; font-size: 16px" type="number" min="0" class="form-control" placeholder="км">
</div>

<div class="mb-3">
    <label class="form-label">Год выпуска</label>
    <input name="year_of_issue" style="width: 50%;height: 50px; font-size: 16px" min="1930" max="2022" type="number" class="form-control" placeholder="1930-2022 г.">
</div>

<div class="mb-3">
    <label class="form-label">Грузоподъемность</label>
    <input name="load_capacity" style="width: 50%;height: 50px; font-size: 16px" min="0" type="number" class="form-control" placeholder="кг">
</div>

<div class="mb-3">
    <label class="form-label">Тип кузова</label>
    <select style="width: 50%;height: 50px; font-size: 16px" name="body_type" class="form-select" aria-label="Default select example">
        <option selected disabled>Выбрать</option>
        <option value="Фургон">Фургон</option>
        <option value="Самосвал">Самосвал</option>
        <option value="Лесовоз">Лесовоз</option>
        <option value="Автоцистерна">Автоцистерна</option>
        <option value="Автовоз">Автовоз</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Колличество осей</label>
    <select style="width: 50%;height: 50px; font-size: 16px" name="number_of_axles" class="form-select" aria-label="Default select example">
        <option selected disabled>Выбрать</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="Больше 4">Больше 4</option>
    </select>
</div>





<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/categories/trucks.blade.php ENDPATH**/ ?>