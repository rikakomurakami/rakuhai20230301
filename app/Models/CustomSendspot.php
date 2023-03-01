<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSendspot extends Model
{
    use HasFactory;
    protected $table = 'sendspots';
    protected $fillable = ['sendspot_name'];

    public function AddSendColumn($request)
    {
        CustomSendspot::create([
            'sendspot_name' => $request->name,
        ]);

        return;
    }
}
