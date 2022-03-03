<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Uses;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'address','arbitrage','userCreate_id'
    ];
    public function user(){
        return $this->hasMany(Uses::class);
    }
}
