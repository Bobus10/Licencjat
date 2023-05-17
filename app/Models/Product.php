<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'description',
        'amount',
        'price',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function isSelectedCategory(int $category_id): bool
    {
        return !is_null($this->category_id) && $this->category->id == $category_id;
    }

    public function hasCategory(): bool
    {
        return !is_null($this->category);
    }

    public function orders(): HasMany{
        return $this->hasMany(Order::class);
    }
}
