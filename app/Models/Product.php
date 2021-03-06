<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model 
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id', 
        'name',
        'code',
        'description',
        'content',
        'hot',
        'new',
        'price',
        'promotion',
        'thumbnail',
        'images',
        'quantity',
        'trademark_id',
        'price_import',
        'origin_id',
    ];

    public function trademark(): BelongsTo
    {
    	return $this->belongsTo(Trademark::class, 'trademark_id', 'id');
    }

    public function origin(): BelongsTo
    {
    	return $this->belongsTo(Origin::class, 'origin_id', 'id');
    }

    public function types(): BelongsToMany
    {
    	return $this->BelongsToMany(Type::class, 'type_product');
    }
}
