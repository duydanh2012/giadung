<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductDetail;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $fillable = [
        'id', 
        'name',
    ];

    public function comment(): HasMany
    {
    	return $this->hasMany(ProductDetail::class, 'color_id', 'id');
    }
}
