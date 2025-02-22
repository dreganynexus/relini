<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupData extends Model
{
        protected $table='backup_data';
        protected $fillable = ['stockName', 'stockPrice', 'quantity', 'amount',];

    use HasFactory;
}
