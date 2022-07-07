<div class="mb-3">
    <label class="form-label">Марка ноутбука</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="laptops_type" class="form-select">
        <option value="" selected disabled>Выбрать</option>
        <option value="Acer">Acer</option>
        <option value="Apple">Apple</option>
        <option value="Asus">Asus</option>
        <option value="Huawei">Huawei</option>
        <option value="Lenovo">Lenovo</option>
        <option value="Sony">Sony</option>
        <option value="Xiaomi">Xiaomi</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Операционная система</label>

    <select required style="width: 50%;height: 50px; font-size: 16px" name="operating_system" class="form-select">
        <option value="" selected disabled>Выбрать</option>
        <option value="Android">UNIX</option>
        <option value="IOS">Mac OS</option>
        <option value="Windows Phone">Windows</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Диагональ экрана</label>
    <input required style="width: 50%;height: 50px; font-size: 16px" name="screen_diagonal" type="number" placeholder="дюймов" min="1" max="18" class="form-control">
</div>

<?php /**PATH C:\OpenServer\domains\dev-slando.com\resources\views/categories/electronics/notebooks.blade.php ENDPATH**/ ?>