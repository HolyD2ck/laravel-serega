<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    use HasFactory;

    protected $table = 'accessories';

    protected $fillable = [
        'id',
        'Название',
        'Цена',
        'Описание',
        'Фото',
        'Производиетль',
        'Материал',
        'Цвет',
        'Страна_Производства',
        'Гарантия',
        'Дата_Выпуска'
    ];

}
