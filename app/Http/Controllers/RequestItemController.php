<?php

namespace App\Http\Controllers;

use App\Company;
use App\Item;
use App\RequestItem;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RequestItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCompany')->except('show');
        $this->middleware('checkSupplier')->only('show');
    }

    public function index(){
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        return view('RequestItem.index')->with('RequestItem',RequestItem::all()->where('company_id',$companyid));
    }
    public function show(){
        $iduser = Auth::user()->id;
        $suppliers = Supplier::all()->where('userCreate_id',$iduser);
        foreach ($suppliers as $supplier) {

            $supplierid = $supplier->id;
        }
        return view('RequestItem.show')->with('RequestItem' , RequestItem::all()->where('supplier_id',$supplierid)->where('status','request'));
    }

    public function store(Request $request){
        $iduser = Auth::user()->id;

        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        $statue = 'request';
        RequestItem::create([
            'item_id' => $request->item_id ,
            'amount' => $request->amount ,
            'user_id'=>$iduser,
            'supplier_id' => $request->supplier_id ,
            'company_id' => $companyid,
            'status'=>$statue,
        ]);
        session()->flash('success','create user successfully');
        return redirect(route('GetAll'));
    }
    public function MakeOrder(RequestItem $requestItem){

       $requestItem->status = 'order';
       $requestItem->save();
        session()->flash('success','Update status successfully');
        return redirect(route('RequestItem.show'));
    }
}
