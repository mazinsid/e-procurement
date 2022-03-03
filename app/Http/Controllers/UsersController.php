<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function makeAdmin(User $user){
        $user->role = "admin";
        $user->save();
        return redirect(route('users.index'));
    }
    public function makeEmployed(User $user){
        $user->role = "employed";
        $user->save();
        return redirect(route('users.index'));
    }

    public function AdminCon(){
        $user = User::all();
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $iduser = $company->userCreate_id;
            $companyid = $company->id;
        }
            $user->userCreate_id = $iduser ;
            $user->company_id = $companyid ;
            $user->save();
        session()->flash('success','create company successfully');
        return redirect(route('users.index'));
    }

    public function index(){
        $iduser = Auth::user()->id;
        return view('users.index')->with('users',User::all()->where('userCreate_id',$iduser));
    }
    public function AllUser(){
        return view('manager.AllUser')->with('users',User::all()->where('role','!=','manager'));
    }
    public function create(){
        return view('users.create');
    }


    public function store(Request $request ){
        $iduser = Auth::user()->id;

        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }

      User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => Hash::make($request->password) ,
            'company_id' => $companyid,
            'userCreate_id'=>$iduser,
            'role' => 'employed' ,

        ]);
        session()->flash('success','create user successfully');
        return redirect(route('users.index'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect(route('users.index'));
    }
    public function destroymanager(User $user){
        $user->delete();
        return redirect(route('users.AllUser'));
    }
}
