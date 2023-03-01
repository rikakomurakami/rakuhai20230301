<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delivery;

class Appls extends Model
{
    use HasFactory;
    /**
     * DeliveryテーブルとApplsの中間テーブルを生成するためのメソッド
     */
    public function roles()
    {
        // User::select('name','role')->where('id', 10)->get();
        return $this->belongsToMany(Delivery::class);
    }
}
