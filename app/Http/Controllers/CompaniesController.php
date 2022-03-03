<?php

namespace App\Http\Controllers;
use App\Company;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertIsNotNumeric\consume;

class CompaniesController extends Controller
{

   public function store(Request $request ){
       $iduser = Auth::user()->id;

      Company::create([
          'name'=>$request->name,
          'email' =>$request->email,
          'address'=>$request->address,
          'arbitrage'=>$request->arbitrage,
          'userCreate_id'=>$iduser,
       ]);
       session()->flash('success','create company successfully');

       return redirect(route('dashboard.company'));
      // return redirect(route('users.AdminCon'));
   }
   public function create(){
       return view('companies.create');
   }
//
//   public function CompanyUser(){
//       $iduser = Auth::user()->id;
//       return Company::all('id')->where($iduser);
//   }

}
