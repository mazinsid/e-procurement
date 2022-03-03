<?php

namespace App;
use App\RequestItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['request_item_id','supplier_id','company_id','total','details','status_order'];


    public function request_item(){
        return $this->belongsTo(RequestItem::class,'request_item_id');

    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
