<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Origin extends Model
{
    use HasFactory;

    protected $table = 'origins';

    protected $fillable = [
        'id', 
        'name',
        'slug',
    ];

    public function products(): HasMany
    {
    	return $this->hasMany(Product::class, 'origin_id', 'id');
    }
}
