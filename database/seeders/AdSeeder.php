<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO advertisements (id, title, description, views, price, checked, is_vip, hidden, category_id, user_id, engine_type, engine_power, engine_volume, transmission, type_of_drive, mileage, year, color, seats, type, load_capacity, body_type, number_of_axles, object_type, floor, rooms, square, kitchen_square, class, furniture, storeys, house_type, amount_acres, heating, phone_brand, operating_system, screen_diagonal, console_type, camera_type, laptops_type, bred, size, created_at, updated_at) VALUES
        (1, 'Продам iPhone 8 NEW', 'Desc for Iphone 8', '0', '350', 1, 1, 0, 14, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Apple', 'IOS', '5', NULL, NULL, NULL, NULL, NULL, '2022-07-03 06:14:44', '2022-07-03 06:37:51'),
        (2, 'BMW X5 Stock', '  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula', '0', '45000', 1, 1, 0, 9, 2, 'gasoline', '200', '2500', 'automatic', 'rear', '0', '2020', 'Красный', '4', 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-03 06:15:38', '2022-07-03 06:25:20'),
        (4, 'Mercedes J7', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.', '0', '25000', 1, 1, 0, 9, 2, 'gasoline', '200', '2500', 'automatic', 'front', '0', '2020', 'Красный', '4', 'used', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-03 06:15:38', '2022-07-03 06:25:20'),
        (7, 'Marin Muirwoods (2020)', 'Marin Muirwoods  - надежный городской велосипед. Рама сделана из прочной и легкой хром-молибденовой стали марки 4130, не подверженной коррозии. Хромоль отлично поглощает и рассеивает мелкие вибрации от неровностей дорожного покрытия. Ригидная вилка также сделана из хром-молибдена. Комфортная посадка позволяет проводить на велосипеде не один час без переутомления. Колеса крепятся эксцентриками, которые позволяют без инструмента снимать их и устанавливать обратно. Увеличенные зазоры позволяют ставить 29\" колеса от горного велосипеда, чтобы превратить свой байк на транспорт для загородных путешествий.', '0', '100000', 1, 1, 0, 24, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-05 18:24:20', '2022-07-05 18:59:42'),
        (8, 'Lada Priora ', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.', '0', '5000', 1, 1, 0, 9, 2, 'electric', '200', '2500', 'mechanical', 'front', '0', '2020', 'Красный', '4', 'used', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-03 06:15:38', '2022-07-03 06:25:20'),
        (9, '123', '123', '0', '122', 0, 0, 0, 23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-06 12:04:17', '2022-07-06 12:04:17'),
        (10, '121', '12', '0', '12', 0, 0, 0, 22, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-06 12:06:06', '2022-07-06 12:06:06'),
        (11, 'iPhone 11', 'Нова система двох камер не залишить жодного з ваших друзів за кадром. Найшвидший процесор iPhone і потужний акумулятор дадуть змогу більше робити та витрачати менше часу для підзаряджання. А найвища якість відео на iPhone означає, що ваші історії стануть яскравішими та детальнішими.На всі камери iPhone 11 можна знімати неймовірно чітке відео 4K з частотою 60 кадрів/с. З об\'єктивом надширококутної камери зона зображення вчетверо більша. Тому камера чудово пасує для знімання сцен із рухом, наприклад, як ваш собака ганяється за м\'ячем. А якщо, скажімо, ви записуєте виступ дитини на концерті та наближаєте зображення, звук наближається теж. Крім того, редагувати відео тепер так само легко, як фото.', '0', '800', 1, 1, 0, 14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Apple', 'IOS', '6', NULL, NULL, NULL, NULL, NULL, '2022-07-06 12:34:58', '2022-07-06 12:34:58');";
        DB::unprepared($query);
    }
    public function down()
    {
        $query = "delete from advertisements";
        DB::unprepared($query);
    }
}
