<?php

namespace App\Models;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'orderdate',
        'order',
        'total'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(product::class);
    }

    public function user(): BelongsTo

    {
        return $this->belongsTo(User::class);
    }
}
