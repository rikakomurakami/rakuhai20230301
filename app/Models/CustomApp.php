<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomApp extends Model
{
    use HasFactory;
    protected $table = 'appls';
    protected $fillable = ['appls_name'];

    public function AddApplsColumn($request)
    {
        CustomApp::create([
            'appls_name' => $request->name,
        ]);

        return;
    }
}
