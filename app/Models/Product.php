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

    protected $fillable = [
        'id','store_id','category_id','name','slug','description','image',
        'price','quantity','compare_price','options','rating','featured','status',
    ];

    protected $hidden = [
        'created_at','updated_at','deleted_at',
        // خدت image من هنا
    ];

    protected $appends = [
        'image_url'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id','id');
    }

    public static function booted()
    {
        // static::addGlobalScope('store',function(Builder $builder){
        //     $user = Auth::user();
        //     if($user && $user->store_id){
        //         $builder->where('store_id','=',$user->store_id);
        //     }
        // });

        static::creating(function(Product $product){
            $product->slug = Str::slug($product->name);
        });
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id',
            'id',
            'id'
        );
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status','=','active');
    }

    
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('assets/images/default-product.jpeg'); // صورة افتراضية
        }

        if (Str::startsWith($this->image, ['http://','https://'])) {
            return $this->image; // لو الصورة متخزنة لينك كامل
        }

        return asset('storage/' . $this->image); // الصورة من storage
    }

    public function getSalePercenAttribute()
    {
        if(!$this->compare_price){
            return 0;
        }

        return number_format(100 - (100 * $this->price / $this->compare_price),1);
    }

    public function scopeFilter(Builder $builder,$filters)
    {
        $options = array_merge([
            'store_id'=> null,
            'category_id'=> null,
            'tag_id'=> null,
            'status'=> 'active',
        ],$filters);

        $builder->when($options['status'],function($query,$status){
            return $query->where('status',$status);
        });

        $builder->when($options['store_id'], function($builder,$value){
            $builder->where('store_id',$value);
        });

        $builder->when($options['category_id'], function($builder,$value){
            $builder->where('category_id',$value);
        });

        $builder->when($options['tag_id'], function($builder,$value){
            $builder->whereExists(function($query) use ($value){
                $query->select(1)
                ->from('product_tag')
                ->whereRaw('product_id = products.id')
                ->where('tag_id',$value);
            });
        });
    }
}


