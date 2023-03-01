<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomGetspot extends Model
{
    use HasFactory;
    protected $table = 'getspots';
    protected $fillable = ['getspot_name'];

    public function AddGetColumn($request)
    {
        CustomGetspot::create([
            'getspot_name' => $request->name,
        ]);

        return;
    }
}
