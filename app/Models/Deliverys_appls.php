<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverys_appls extends Model
{
    use HasFactory;
    protected $table = 'deliverys_appls';
    protected $fillable = ['deliverys_id','appls_id','money'];
}
