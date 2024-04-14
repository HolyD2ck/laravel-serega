<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->string('Модель');
            $table->string('Производитель');
            $table->date('Дата_Выпуска');
            $table->decimal('Цена', 8, 2);
            $table->text('Описание');
            $table->string('Фото');
            $table->string('Разрешение');
            $table->boolean('Wi_Fi_поддержка');
            $table->boolean('Bluetooth_поддержка');
            $table->timestamps();
        });

        Schema::create('videocameras', function (Blueprint $table) {
            $table->id();
            $table->string('Модель');
            $table->string('Производитель');
            $table->date('Дата_Выпуска');
            $table->decimal('Цена', 8, 2);
            $table->text('Описание');
            $table->string('Фото');
            $table->string('Разрешение');
            $table->boolean('Wi_Fi_поддержка');
            $table->boolean('Bluetooth_поддержка');
            $table->timestamps();
        });

        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('Название');
            $table->decimal('Цена', 8, 2);
            $table->text('Описание');
            $table->string('Фото');
            $table->string('Производитель');
            $table->string('Материал');
            $table->string('Цвет');
            $table->string('Страна_Производства');
            $table->boolean('Гарантия');
            $table->date('Дата_Выпуска');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('accessories');
        Schema::dropIfExists('videocamera');
    }
};
