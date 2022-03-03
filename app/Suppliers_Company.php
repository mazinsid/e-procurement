<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Supplier;
use App\Company;
class Suppliers_Company extends Model
{
    protected $fillable = ['supplier_id','company_id'];
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function company(){
    return $this->belongsTo(Company::class);
}
}
