<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accessories;
use App\Models\Videocameras;
use App\Models\Cameras;

class OrdersModel extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function cameras()
    {
        return $this->morphedByMany(Cameras::class, 'orderable', 'orderables', 'order_id')->withPivot('quantity');
    }

    public function videocameras()
    {
        return $this->morphedByMany(Videocameras::class, 'orderable', 'orderables', 'order_id')->withPivot('quantity');
    }

    public function accessories()
    {
        return $this->morphedByMany(Accessories::class, 'orderable', 'orderables', 'order_id')->withPivot('quantity');
    }


}

