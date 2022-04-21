<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'bill_details';

    protected $fillable = [
        'id', 
        'price',
        'number',
        'product_id',
        'bill_id',
    ];

    public function bill(): BelongsTo
    {
    	return $this->belongsTo(BillDetail::class, 'bill_id', 'id');
    }

    public function product(): BelongsTo
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
