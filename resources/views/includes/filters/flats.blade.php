<form action="{{ route('filter', $category->first()->id) }}" method="GET">

    <input type="hidden" name="category_id" value="{{ $category->first()->id }}">

    <div class="mt-3 mb-3">
        <label>Вид объекта</label><br>
        <input type="checkbox" value="Вторичка" name="object_type[]"/> Вторичка<br>
        <input type="checkbox" value="Новострой" name="object_type[]"/> Новострой<br>
    </div>

    <div class="mt-3 mb-3">
        <label>Цена</label><br>
        <input class="mb-1" type="number" value="0" placeholder="от" name="from"/><br>
        <input class="mb-1" type="number" value="{{ $advertisements->max('price') }}" placeholder="от" name="to"/><br>
    </div>

    <button class="btn btn-success" type="submit">Фильтровать</button>
</form>
