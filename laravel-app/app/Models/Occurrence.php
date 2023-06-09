<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    use HasFactory;
    protected $fillable = [
        'consumables_id',
        'occurrences_galery_id',
        'users_id',
    ];
}
