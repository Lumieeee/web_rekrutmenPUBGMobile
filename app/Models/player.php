<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    use HasFactory;

    protected $table = 'pubg_players'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'pubg_id',
        'name',
        'kd',
        'win_ratio',
        'accuracy',
        'headshot_rate',
        'prediction_status',
    ];
}
