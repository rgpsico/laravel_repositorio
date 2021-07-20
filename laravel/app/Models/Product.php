<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','url','description','price'];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('orderByPrice', function(Builder $builder){
            $builder->orderBy('price','asc');

        });

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
