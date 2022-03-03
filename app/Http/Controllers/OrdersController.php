<?php

namespace App\Http\Controllers;


use App\Company;
use App\Order;
use App\RequestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCompany')->except('store');
        $this->middleware('checkSupplier')->only('store');
    }

    public function index(){
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        return view('orders.index')->with('Orders',Order::all()->where('company_id',$companyid)
        ->where('status_order' ,'request'));
    }
    public function MakeDelivered(Order $order){
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        $order->status_order = "delivered";
        $order->save();

        session()->flash('success',' successfully');
        return view('orders.delivered')->with('Orders',Order::all()->where('company_id',$companyid)
            ->where('status_order' ,'delivered'));
    }
    public function show(){
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }

        return view('orders.delivered')->with('Orders',Order::all()->where('company_id',$companyid)
            ->where('status_order' ,'!=','request'));
    }
    public function store(Request $request ){


        Order::create([
            'request_item_id' => $request->request_item_id ,
            'total' => $request->total ,
            'details' => $request->details,
            'supplier_id' => $request->supplier_id,
            'company_id' => $request->company_id,
        ]);
        $requestItem = RequestItem::all()->find($request->request_item_id);
        $status = 'order';
        $requestItem->update([
            'status' => $status
        ]);
        session()->flash('success','create user successfully');
        return redirect(route('RequestItem.show'));
    }
}
