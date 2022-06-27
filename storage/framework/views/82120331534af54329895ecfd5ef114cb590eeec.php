<?php echo $__env->make('includes.user.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
<?php echo $__env->make('includes.user.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
    <div class="mt-3">
        <a style="text-decoration: none; color:black" href="<?php echo e(URL::previous()); ?>"><img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/860/860790.png" alt="">Назад</a>
    </div>
    <h3 class="mt-3">Создать объявление</h3>
</div>

<div class="container">
    <form method="POST" action="<?php echo e(route('advertisement.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input name="category_id" id="input-categories" type="text" style="display: none;">
        <div class="card-body">
            <div class="form-group">
                <label>Укажите название</label>
                <input required name="title" type="text" class="form-control"
                       style="width:50%;height: 50px;font-size: 18px;" placeholder="Например, iPhone 8">
            </div>

            <select required style="width: 50%;height: 50px;margin-bottom: 10px; font-size: 16px;" class="form-select"
                    aria-label="Default select example">
                <option value='' selected>Выбери категорию</option>
            </select>

            <select required class="child-category form-select"
                    style="display: none; width: 50%;height: 50px;margin-top: 15px; margin-bottom: 15px; font-size: 16px;">

            </select>

            <div class="form-group">
                <label>Описание</label>
                <textarea required name="description" class="form-control" style="width:70%" rows="3"
                          placeholder="Подумайте, какие подробности вы хотели бы узнать из объявления. И добавьте их в описание"></textarea>
            </div>

            <div class="form-group">
                <label>Цена</label>
                <input required name="price" type="number" min="0" placeholder="грн" class="form-control" style="width:30%;height:50px;font-size: 18px;">
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


<script src="<?php echo e(asset('js/script.js')); ?>"></script>

<script>

    const categoriesMap = new Map([
        ['9', `<?php echo $__env->make('categories.vehicles.cars', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['10', `<?php echo $__env->make('categories.vehicles.trucks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['11', `<?php echo $__env->make('categories.vehicles.moto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['12', `<?php echo $__env->make('categories.property.flats', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['13', `<?php echo $__env->make('categories.property.houses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['14', `<?php echo $__env->make('categories.electronics.smartphones', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['15', `<?php echo $__env->make('categories.electronics.notebooks', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['16', `<?php echo $__env->make('categories.electronics.consoles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['17', `<?php echo $__env->make('categories.electronics.cameras', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['19', `<?php echo $__env->make('categories.pets.cats', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['20', `<?php echo $__env->make('categories.pets.dogs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['21', `<?php echo $__env->make('categories.clothing.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
        ['22', `<?php echo $__env->make('categories.clothing.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`],
    ]);

    const select = document.querySelector(".form-select")
    const select_child = document.querySelector(".child-category")
    const json = JSON.parse('<?php echo $categories ?>');


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
</html>
<?php /**PATH C:\OpenServer\domains\slando.com\resources\views/advertisement/create.blade.php ENDPATH**/ ?>