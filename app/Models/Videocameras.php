<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videocameras extends Model
{
    use HasFactory;
    protected $table = 'videocameras';

    protected $fillable =
        [
            'id',
            'Модель',
            'Производитель',
            'Дата_Выпуска',
            'Цена',
            'Описание',
            'Фото',
            'Разрешение',
            'Wi_Fi_поддержка',
            'Bluetooth_поддержка'
        ];
    public function orders()
    {
        return $this->morphToMany(\App\Models\OrdersModel::class, 'orderable')->withPivot('quantity');
    }

}