<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delivery;

class Sendspots extends Model
{
    use HasFactory;
    /**
     * DeliveryテーブルとSendspotsの中間テーブルを生成するためのメソッド
     */
    public function roles()
    {
        return $this->belongsToMany(Delivery::class);
    }
}
