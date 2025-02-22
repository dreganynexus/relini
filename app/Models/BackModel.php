<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackModel extends Model
{

    protected $table = 'back_models';
    protected $fillable = ['stockName', 'stockPrice', 'quantity', 'amount', 'date'];

    // public $timestamps = false;
    use HasFactory;
}
