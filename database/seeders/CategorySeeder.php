<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO categories (id, title, img_src, parent_id, created_at, updated_at) VALUES
        (1, 'Авто', '/images/icons/category-png-gray/car.png', NULL, NULL, NULL),
        (2, 'Недвижимость ', '/images/icons/category-png-gray/warehouse.png', NULL, NULL, NULL),
        (3, 'Электронника', '/images/icons/category-png-gray/phone.png', NULL, NULL, NULL),
        (4, 'Животные', '/images/icons/category-png-gray/animal.png', NULL, NULL, NULL),
        (5, 'Одежда', '/images/icons/category-png-gray/shirt.png', NULL, NULL, NULL),
        (6, 'Спорт', '/images/icons/category-png-gray/ball.png', NULL, NULL, NULL),
        (7, 'Детский мир', '/images/icons/category-png-gray/toy.png', NULL, NULL, NULL),
        (8, 'Дом и сад', '/images/icons/category-png-gray/fix.png', NULL, NULL, NULL),
        (9, 'Легковые автомобили', NULL, 1, NULL, NULL),
        (10, 'Грузовые автомобили', NULL, 1, NULL, NULL),
        (11, 'Мотоциклы ', NULL, 1, NULL, NULL),
        (12, 'Квартиры ', NULL, 2, NULL, NULL),
        (13, 'Дома', NULL, 2, NULL, NULL),
        (14, 'Смартфоны ', NULL, 3, NULL, NULL),
        (15, 'Ноутбуки ', NULL, 3, NULL, NULL),
        (16, 'Консоли ', NULL, 3, NULL, NULL),
        (17, 'Фотоаппараты ', NULL, 3, NULL, NULL),
        (19, 'Коты', NULL, 4, NULL, NULL),
        (20, 'Собаки', NULL, 4, NULL, NULL),
        (21, 'Мужская', NULL, 5, NULL, NULL),
        (22, 'Женская ', NULL, 5, NULL, NULL),
        (23, 'Велосипеды', NULL, 6, NULL, NULL),
        (24, 'Лыжи ', NULL, 6, NULL, NULL),
        (25, 'Коньки', NULL, 6, NULL, NULL),
        (26, 'Игрушки ', NULL, 7, NULL, NULL),
        (27, 'Коляски', NULL, 7, NULL, NULL),
        (28, 'Детская одежда', NULL, 7, NULL, NULL),
        (29, 'Инструменты', NULL, 8, NULL, NULL),
        (30, 'Предметы интерьера', NULL, 8, NULL, NULL),
        (31, 'Мебель', NULL, 8, NULL, NULL);";
        DB::unprepared($query);
    }
    public function down(){
        $query = "delete from category";
        DB::unprepared($query);
    }
}
