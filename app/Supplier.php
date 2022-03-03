<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Item;
use Illuminate\Support\Facades\Auth;

class Supplier extends Model
{

    protected $fillable = [
        'name','address','phone','about', 'userCreate_id'
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->hasMany(Item::class);
    }

}
