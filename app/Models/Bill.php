<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'id', 
        'name',
        'code',
        'email',
        'address',
        'total',
        'paymentMethod',
        'phone',
        'user_id',
        'delivery_date',
    ];

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bill_detail(): HasMany
    {
    	return $this->hasMany(BillDetail::class, 'bill_id', 'id');
    }
}
