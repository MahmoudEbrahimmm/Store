<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            if($user && $user->store_id){
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

    public function scopeActive(Builder $builder){
        $builder->where('status','=','active');
    }
    
    public function getImageUrlAttribute(){

        return asset('assets/images/defalt product.jpeg');

        // return 'https://altareeqkitchen.com/static/site/images/default-product.png';
        // if(!$this->image){
        //     return 'https://altareeqkitchen.com/static/site/images/default-product.png';
        // }
        // if(Str::startsWith($this->image,['http://','https://'])){
        //     return $this->image;
        // }
    }
    public function getSalePercenAttribute(){
        if(!$this->compare_price){
            return 0;
        }

        return number_format(100 - (100 * $this->price / $this->compare_price),1);
    }
    // public function getNewAttribute(){
    //     return '';
    // }
}
