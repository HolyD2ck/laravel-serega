<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cameras>
 */
class CamerasFactory extends Factory
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
            'Canon EOS 5D',
            'Nikon D850',
            'Sony Alpha a7R IV',
            'Fujifilm X-T4',
            'Olympus OM-D E-M1 Mark III',
            'Panasonic Lumix DC-GH5',
            'Leica Q2',
            'Hasselblad X1D II 50C',
            'Phase One XF IQ4 150MP',
            'Pentax K-1 Mark II',
        ];
        $resolution = [
            '1920x1080',
            '1080x1080',
            '1280x720',
            '4k, 3840x2160',
            '720x576',
            '1440x900',
            '2048x1152'
        ];
        $images = [
            '/img/faker/cameras/12.jpg',
            '/img/faker/cameras/21аd.jpg',
            '/img/faker/cameras/23c.jpg',
            '/img/faker/cameras/546e.jpg',
            '/img/faker/cameras/2324.jpg',
            '/img/faker/cameras/16826b.jpg',
        ];

        return [
            'Модель' => $faker->randomElement($modelNames),
            'Производитель' => $faker->company,
            'Дата_Выпуска' => $faker->date,
            'Цена' => $faker->randomFloat(2, 100, 20000),
            'Описание' => $faker->text,
            'Фото' => $faker->randomElement($images),
            'Разрешение' => $faker->randomElement($resolution),
            'Wi_Fi_поддержка' => $faker->boolean,
            'Bluetooth_поддержка' => $faker->boolean,
        ];
    }
}
