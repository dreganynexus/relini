<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salersend extends Model
{
    use HasFactory;
    protected $table = 'salersends';
    protected $fillable = ['stockName', 'stockPrice', 'quantity', 'amount'];
}
