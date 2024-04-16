<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accessories>
 */
class AccessoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('ru_RU');

        $modelNames = [
            'Штатив',
            'Селфи Палка',
            'Чехол',
            'Стабилизатор',
            'Сетевое зарядное устройство',
            'Бленда',
            'Переходник',
            'Монопод',
            'Микрокольцо',
            'Адаптер переходник',
        ];
        $images = [
            '/img/faker/accessories/1.jpg',
            '/img/faker/accessories/2.jpg',
            '/img/faker/accessories/3.jpg',
            '/img/faker/accessories/4.jpg',
            '/img/faker/accessories/5.jpg',
            '/img/faker/accessories/6.jpg',
            '/img/faker/accessories/7.jpg',
            '/img/faker/accessories/8.jpg',
            '/img/faker/accessories/9.jpg',
            '/img/faker/accessories/10.jpg',
        ];

        return [
            'Название' => $faker->randomElement($modelNames),
            'Цена' => $faker->randomFloat(20, 100, 1000),
            'Описание' => $faker->text,
            'Фото' => $faker->randomElement($images),
            'Производитель' => $faker->company,
            'Материал' => $faker->randomElement(['Алюминий', 'Пластик', 'Металл', 'Резина', 'Медь']),
            'Цвет' => $faker->colorName,
            'Страна_Производства' => $faker->country,
            'Гарантия' => $faker->boolean,
            'Дата_Выпуска' => $faker->date,
        ];
    }
}

