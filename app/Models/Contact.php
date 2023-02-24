<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message'];

    public static function createContact($name, $email, $message)
    {
        return self::create([
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);
    }
}
