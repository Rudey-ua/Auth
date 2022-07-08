@include('includes.user.head')

<body>
@include('includes.user.navbar')

<div class="container">
    <div class="mt-3">
        <a style="text-decoration: none; color:black" href="{{ URL::previous() }}"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>
    <h3 class="mt-3">Создать объявление</h3>
</div>

<div class="container">
    <form method="POST" action="{{ route('advertisement.store') }}" enctype="multipart/form-data">
        @csrf
        <input name="category_id" id="input-categories" type="text" style="display: none;">
        <div class="card-body">
            <div class="form-group mb-3">
                <label>Укажите название</label>
                <input required name="title" type="text" class="form-control" style="width:50%;height: 50px;font-size: 18px;" placeholder="Например, iPhone 8">
            </div>

            <select required style="width: 50%;height: 50px;margin-bottom: 10px; font-size: 16px;" class="form-select"
                    aria-label="Default select example">
                <option value='' selected>Выберите категорию</option>
            </select>

            <select required class="child-category form-select" style="display: none; width: 50%;height: 50px;margin-top: 15px; margin-bottom: 15px; font-size: 16px;"></select>

            <div class="form-group">
                <label>Описание</label>
                <textarea minlength="80" required name="description" class="form-control" style="width:70%" rows="3" placeholder="Подумайте, какие подробности вы хотели бы узнать из объявления. И добавьте их в описание"></textarea>
            </div>

            <div class="form-group mt-2 mb-3">
                <label>Цена</label>
                <input required name="price" type="number" min="0" placeholder="USD" class="form-control" style="width:30%;height:50px;font-size: 18px;">
            </div>

            <div id="result">
                <div class="result 1">
                <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                </div>
                <div class="result 2">
                <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                    <span class="full_container">
                    <label class="group_container">
                        <input hidden name="images[]" class="files" type="file" accept="image/*">
                    </label>
                </span>
                </div>
            </div>

            <div id="9" class="cl"></div>
            <div id="10" class="cl"></div>
            <div id="11" class="cl"></div>
            <div id="12" class="cl"></div>
            <div id="13" class="cl"></div>
            <div id="14" class="cl"></div>
            <div id="15" class="cl"></div>
            <div id="16" class="cl"></div>
            <div id="17" class="cl"></div>
            <div id="19" class="cl"></div>
            <div id="20" class="cl"></div>
            <div id="21" class="cl"></div>
            <div id="22" class="cl"></div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Опубликовать</button>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/script.js') }}"></script>

<script>

    const categoriesMap = new Map([
        ['9', `@include('categories.vehicles.cars')`],
        ['10', `@include('categories.vehicles.trucks')`],
        ['11', `@include('categories.vehicles.moto')`],
        ['12', `@include('categories.property.flats')`],
        ['13', `@include('categories.property.houses')`],
        ['14', `@include('categories.electronics.smartphones')`],
        ['15', `@include('categories.electronics.notebooks')`],
        ['16', `@include('categories.electronics.consoles')`],
        ['17', `@include('categories.electronics.cameras')`],
        ['19', `@include('categories.pets.cats')`],
        ['20', `@include('categories.pets.dogs')`],
        ['21', `@include('categories.clothing.common')`],
        ['22', `@include('categories.clothing.common')`],
    ]);

    const select = document.querySelector(".form-select")
    const select_child = document.querySelector(".child-category")
    const json = JSON.parse('@php echo $categories @endphp');


    addCategories()

    function addCategories() {

        for (let category of json) {

            if (category["parent_id"] == null) {
                let option = document.createElement("option")
                option.value = category["id"]
                option.text = category["title"]
                select.insertAdjacentElement("beforeend", option)
            }
        }
    }


    select.addEventListener("change", (e) => {
        const value = e.target.value
        let hasParent = false

        while (select_child.firstChild) {
            select_child.removeChild(select_child.firstChild)
        }

        let opt = document.createElement("option")
        opt.selected = true
        opt.text = "Выберите подкатегорию"
        opt.value = ''
        select_child.insertAdjacentElement("beforeend", opt)

        for (let category of json) {
            if (category["parent_id"] == value) {
                hasParent = true
                let option = document.createElement("option")
                option.value = category["id"]
                option.text = category["title"]
                select_child.insertAdjacentElement("beforeend", option)
            }
        }

        if (hasParent) {
            select_child.style.display = "block"
        } else {
            select_child.style.display = "none"

            document.getElementById("input-categories").value = "";
        }
    })

    select_child.addEventListener("change", (e) => {

        const value = e.target.value
        document.getElementById("input-categories").value = value;
        for (let div of document.querySelectorAll(".cl")) {
            if (div.id == value) {
                div.innerHTML = categoriesMap.get(div.id)
            } else {
                while (div.firstChild) {
                    div.firstChild.remove()
                }
            }
        }
    })

</script>


</body>
