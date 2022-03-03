<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use App\Supplier;
use \App\RequestItem;

class Item extends Model
{
    protected $fillable = ['name' , 'amount','price' , 'about','category_id', 'image','supplier_id'];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function RequestItem(){
        return $this->hasMany(RequestItem::class);
    }
}
