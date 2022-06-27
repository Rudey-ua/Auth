<div class="mb-3">
    <label class="form-label">Вид объекта</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="object_type" class="form-select">
        <option value="" selected disabled>Выбрать</option>
        <option value="Вторичка">Вторичка</option>
        <option value="Новострой">Новострой</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Этаж</label>
    <input required style="width: 50%;height: 50px; font-size: 16px" name="floor" type="number" min="1" max="50" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Этажность дома</label>
    <input required style="width: 50%;height: 50px; font-size: 16px" name="storeys" type="number" min="1" max="50" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Колличество комнат</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="rooms" class="form-select">
        <option value="" selected disabled>Выбрать</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="3">4</option>
        <option value="4">5</option>
        <option value="5+">5+</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Общая площадь</label>
    <input required style="width: 50%;height: 50px; font-size: 16px" name="square" type="number" min="0" placeholder="м^2" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Площадь кухни</label>
    <input required style="width: 50%;height: 50px; font-size: 16px" name="kitchen_square" type="number" min="0" placeholder="м^2" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Класс жилья</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="class" class="form-select">
        <option value="" selected disabled>Выбрать</option>
        <option value="Эконом">Эконом</option>
        <option value="Комфорт">Комфорт</option>
        <option value="Бизнес">Бизнес</option>
        <option value="Элит">Элит</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Меблирование</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="furniture" class="form-select">
        <option value="" selected disabled>Выбрать</option>
        <option value="Эконом">Да</option>
        <option value="Комфорт">Нет</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Отопление</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="heating" class="form-select">
        <option value="" selected disabled>Выбрать</option>
        <option value="Централизованное">Централизованное</option>
        <option value="Собственная котельная">Собственная котельная</option>
        <option value="Индивидуальное газовое">Индивидуальное газовое</option>
        <option value="Тепловой насос">Тепловой насос</option>
        <option value="Комбинированное">Комбинированное</option>
    </select>
</div>


<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/categories/property/flats.blade.php ENDPATH**/ ?>