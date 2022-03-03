<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lnvoice extends Model
{
    protected $fillable = ['order_id','supplier_id','company_id','status_invoice'];

    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
