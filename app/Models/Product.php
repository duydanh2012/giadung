<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

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
        'color_id',
        'trademark_id',
        'price_import',
    ];

    public function color(): BelongsTo
    {
    	return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function trademark(): BelongsTo
    {
    	return $this->belongsTo(Trademark::class, 'trademark_id', 'id');
    }

    public function types(): BelongsToMany
    {
    	return $this->BelongsToMany(Type::class, 'type_product');
    }
}
