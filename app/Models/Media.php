<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';

    protected $fillable = [
        'id', 
        'name',
        'reference_id',
        'reference_type',
    ];
}
