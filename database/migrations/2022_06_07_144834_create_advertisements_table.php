<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('views')->default(0);
            $table->string('price');
            $table->boolean('checked')->default(0);
            $table->boolean('is_vip')->default(0);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            /*-----------------------Vehicle-----------------------*/

            /*Cars*/

            $table->string('engine_type')->nullable(); // Тип двигателя
            $table->string('engine_power')->nullable(); // Мощность двигателя
            $table->string('engine_volume')->nullable(); // Объем двигателя - см^3
            $table->string('transmission')->nullable(); // Коробка передач - Механика, Автомат
            $table->string('type_of_drive')->nullable(); // Тип привода - Полный, задний, передний
            $table->string('mileage')->nullable(); // Пробег
            $table->string('year')->nullable(); // Год выпуска
            $table->string('color')->nullable(); // Цвет
            $table->string('seats')->nullable(); // Колличество мест
            $table->string('type')->nullable(); // Тип - Новый, Б/У

            /*Trucks*/

            $table->string('load_capacity')->nullable(); // Грузоподъемность
            $table->string('body_type')->nullable(); // Тип кузова
            $table->string('number_of_axles')->nullable(); // Кол-во осей

            /*-----------------------Property-----------------------*/

            /*Flats*/

            $table->string('object_type')->nullable(); // Вид объекта - Вторичка/Новострой
            $table->string('floor')->nullable(); // Этаж
            $table->string('rooms')->nullable(); // Колличество комнат
            $table->string('square')->nullable(); // Общая площадь квартиры
            $table->string('kitchen_square')->nullable(); // Площадь кухни
            $table->string('class')->nullable(); // Класс жилья - Эконом, комфорт, бизнес
            $table->string('furniture')->nullable(); // Мебель - есть, нет

            /*Houses*/

            $table->string('storeys')->nullable(); // Этажность дома 1,2,3 этажа
            $table->string('house_type')->nullable(); // Дом, коттедж, дача
            $table->string('amount_acres')->nullable(); // Кол-во соток
            $table->string('heating')->nullable(); // Отопление - цетрализированное, своя котельная

            /*-----------------------Electronics-----------------------*/

            /*Phones*/

            $table->string('phone_brand')->nullable(); // Марка телефона
            $table->string('operating_system')->nullable(); // Операционная система
            $table->string('screen_diagonal')->nullable(); // Диагональ экрана

            /*Consoles*/

            $table->string('console_type')->nullable(); // Тип приставки - PlayStation, Xbox

            /*Cameras*/

            $table->string('camera_type')->nullable(); // Тип камеры - Nikon, Samsung

            /*Laptops*/

            $table->string('laptops_type')->nullable(); // Марка ноутбука - Acer, Xiaomi

            /*-----------------------Pets-----------------------*/

            $table->string('bred')->nullable(); // Порода - Бульдог, бурбуль, далматин

            /*-----------------------Clothing-----------------------*/

            $table->string('size')->nullable(); // Размер

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
};
