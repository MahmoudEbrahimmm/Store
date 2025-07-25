<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'image',
        'status',
        'slug'
    ];
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id','id')
        ->withDefault(['name'=>'-']);
    }
    public function children(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function scopeFilter(Builder $builder, $filters)
    {
        if ($filters['name'] ?? false) {
            $builder->where('categories.name', 'LIKE', '%' . $filters['name'] . '%');
        }

        if ($filters['status'] ?? false) {
            $builder->where('categories.status', '=', $filters['status']);
        }
    }
    public static function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:15',
                function ($attribute, $value, $fails) {
                    if (strtolower($value) == 'laravel' || strtolower($value) == 'admin' || strtolower($value) == 'adminstratore') {
                        $fails('!لا يمكن استخدام هذا الاسم');
                    }
                }
            ],
            'parent_id' => ['nullable', 'int', 'exists:categories,id'],
            'image' => ['image', 'max:1048576', 'mimes:png,jpg'],
            'status' => ['in:active,archived'],
            'password' => 'min:6',
        ];
    }
}
