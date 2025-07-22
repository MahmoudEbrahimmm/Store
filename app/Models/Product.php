<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'id','store_id','category_id','name','slug','description','image','price','compare_price','options','rating','featured','status',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function store(){
        return $this->belongsTo(Store::class,'store_id','id');
    }

    public static function booted(){
        static::addGlobalScope('store',function(Builder $builder){
            $user = Auth::user();
            if($user->store_id){
                $builder->where('store_id','=',$user->store_id);
            }
        });
    }
    public function tags(){
        return $this->belongsToMany(
            Tag::class, // Related Model
            'product_tag', // Pivot table name
            'product_id', // FK in pivot table curent model
            'tag_id', // FK in pivot table related model
            'id', // PK curent model
            'id' // PK related model
        );

    }
}
