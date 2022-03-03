<?php

namespace App;

use App\Item;
use App\Supplier;
use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    protected $fillable = [
       'item_id', 'amount','user_id','company_id','supplier_id','status'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    } public function company(){
        return $this->belongsTo(Company::class);
    }
}
