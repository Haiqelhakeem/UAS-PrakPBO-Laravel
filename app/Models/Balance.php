<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_balance';
    protected $table = 'balance';
    protected $guarded = ['id_balance'];
    public $timestamps = false;
}
