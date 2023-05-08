<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;



    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('brand', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('category', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['search'] . '%');
                }

        if($filters['category'] ?? false) {
            $query->where('category_id', $filters['category']);
        }

        if($filters['brand'] ?? false) {
            $query->where('brand', $filters['brand']);
        }

        if($filters['min'] ?? false) {
            $query->where('price', '>=', $filters['min']);
        }

        if($filters['max'] ?? false) {
            $query->where('price', '<=', $filters['max']);
        }

        if($filters['size'] ?? false) {
            foreach ($filters['size'] as $size) {
                $query->where($size, '!=', '0');
            }
        }

    }


    public function scopeFind ($query, $product_ids) {
        foreach ($product_ids as $id) {
            $query->where('id', '==', $id);
        }
    }

    public function category (): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews():HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlist():HasOne
    {
        return $this->hasOne(Wishlist::class);
    }

    public function cart():HasOne
    {
        return $this->hasOne(Cart::class);
    }
}
