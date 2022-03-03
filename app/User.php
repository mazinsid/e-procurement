<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Company;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','company_id','userCreate_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        return $this->role == 'admin';
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function isCreated(){
        return $this->role == 'created';
    }
    public function isManager(){
        return $this->role == 'manager';
    }
    public function isEmployed(){
        return $this->role == 'employed';
    }
    public function isSuppliers(){
        return $this->role == 'supplier';
    }
    public function SupplierUser(){
        $iduser = Auth::user()->id;
        $supC =Supplier::all()->where('CreateUser_id',$iduser);
        if($supC->count() == 0)
            return true ;
        else
            return false;
    }
}
