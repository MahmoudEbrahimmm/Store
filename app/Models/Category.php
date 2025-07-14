<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','parent_id','description','image','status','slug'
    ];
    
    public static function rules(){
        return [
            'name'=>['required','string','min:3','max:15'],
            'parent_id'=>['nullable','int','exists:categories,id'],
            'image'=>['image','max:1048576','mimes:png,jpg'],
            'status'=>['in:active,archived'],
            'password'=>'min:6',
        ];
    }
}
