<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OccurrenceGalery extends Model
{
    protected $table = 'occurrences_galery';
    protected $fillable = ['name'];
    
    use HasFactory;
}
