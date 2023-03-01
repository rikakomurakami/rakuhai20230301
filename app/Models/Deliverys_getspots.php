<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverys_getspots extends Model
{
    use HasFactory;
    protected $table = 'deliverys_getspots';
    protected $fillable = ['deliverys_id','getspots_id'];
}