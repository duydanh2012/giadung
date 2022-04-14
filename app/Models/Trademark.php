<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Trademark extends Model
{
    use HasFactory;

    protected $table = 'trademarks';

    protected $fillable = [
        'id', 
        'name',
    ];

    public function products(): HasMany
    {
    	return $this->hasMany(Product::class, 'trademark_id', 'id');
    }
}
