<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
        'name','brand','descritpion','category_id','selling_price','originial_price','status','qty'
    ];
    public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');
    }
    public function productImages(){
        return $this->hasMany(productdetails::class,'product_id','id');
    }
}
