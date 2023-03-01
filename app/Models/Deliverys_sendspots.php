<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverys_sendspots extends Model
{
    use HasFactory;
    protected $table = 'deliverys_sendspots';
    protected $fillable = ['deliverys_id','sendspots_id'];
}
