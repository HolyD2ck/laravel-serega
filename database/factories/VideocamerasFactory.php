<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videocameras>
 */
class VideocamerasFactory extends Factory
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
            '/img/faker/videocameras/1.jpg',
            '/img/faker/videocameras/2.jpg',
            '/img/faker/videocameras/3.jpg',
            '/img/faker/videocameras/4.jpg',
            '/img/faker/videocameras/5.jpg',
            '/img/faker/videocameras/6.jpg',
        ];

        return [
            'Модель' => $faker->randomElement($modelNames),
            'Производитель' => $faker->company,
            'Дата_Выпуска' => $faker->date,
            'Цена' => $faker->randomFloat(20000, 30000, 400000),
            'Описание' => $faker->text,
            'Фото' => $faker->randomElement($images),
            'Разрешение' => $faker->randomElement($resolution),
            'Wi_Fi_поддержка' => $faker->boolean,
            'Bluetooth_поддержка' => $faker->boolean,
        ];
    }
}
