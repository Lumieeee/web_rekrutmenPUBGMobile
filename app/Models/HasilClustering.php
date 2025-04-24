<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilClustering extends Model
{
    use HasFactory;

    protected $table = 'hasil_clustering';

    protected $fillable = [
        'pubg_id',
        'name',
        'kd',
        'win_ratio',
        'accuracy',
        'headshot_rate',
        'cluster_status',
    ];
}

