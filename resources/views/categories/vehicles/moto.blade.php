<div class="mb-3">
    <label class="form-label">Тип двигателя</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="engine_type" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Выбрать</option>
        <option value="Бензиновый">Бензиновый</option>
        <option value="Дизельный">Дизельный</option>
        <option value="Электрический">Электрический</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Мощность двигателя</label>
    <input required style="width: 50%;height: 50px; font-size: 16px" name="engine_power" type="number" min="0" max="2000" class="form-control" placeholder="л.с">
</div>

<div class="mb-3">
    <label class="form-label">Объем двигателя</label>
    <input required style="width: 50%;height: 50px; font-size: 16px" name="engine_volume" type="number" min="0" class="form-control" placeholder="см^3">
</div>

<div class="mb-3">
    <label class="form-label">Состояние</label>
    <select required style="width: 50%;height: 50px; font-size: 16px" name="type" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Выбрать</option>
        <option value="Новый">Новый</option>
        <option value="Б/У">Б/У</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Коробка передач</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="transmission" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Выбрать</option>
        <option value="Механическая">Механическая</option>
        <option value="Автоматическая">Автоматическая</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Тип привода</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="type_of_drive" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Выбрать</option>
        <option value="Кардан">Кардан</option>
        <option value="Ремень">Ремень</option>
        <option value="Цепь">Цепь</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Пробег</label>
    <input required name="car_mileage" style="width: 50%;height: 50px; font-size: 16px" type="number" min="0" class="form-control" placeholder="км">
</div>

<div class="mb-3">
    <label class="form-label">Год выпуска</label>
    <input required name="year_of_issue" style="width: 50%;height: 50px; font-size: 16px" min="1930" max="2022" type="number" class="form-control" placeholder="1930-2022 г.">
</div>

<div class="mb-3">
    <label class="form-label">Цвет</label>
    <select required style="width: 50%;height: 50px; font-size: 16px" name="painting_color" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Выбрать</option>
        <option value="Белый">Белый</option>
        <option value="Черный">Черный</option>
        <option value="Синий">Синий</option>
        <option value="Красный">Красный</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Количество мест</label>
    <select required style="width: 50%;height: 50px; font-size: 16px" name="seats" class="form-select" aria-label="Default select example">
        <option value="" selected disabled>Выбрать</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
</div>




