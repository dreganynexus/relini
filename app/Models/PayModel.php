<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayModel extends Model
{
    use HasFactory;
    protected $table='pay_models';
    protected $fillable=['pay'];
}
