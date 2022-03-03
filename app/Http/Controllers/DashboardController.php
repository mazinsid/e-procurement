<?php

namespace App\Http\Controllers;

use App\Company;
use App\lnvoice;
use App\Order;
use App\RequestItem;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkCompany')->only('company');
        $this->middleware('checkSupplier')->only('supplier');
    }

    public function company(){
        $iduser = Auth::user()->id;

        $companies = Company::all()->where('userCreate_id',$iduser)->find('id');
        $companyid = $companies;
//        foreach ($companies as $company) {
//
//            $companyid = $company->id;
//        }
        return view('dashboard.company')->with(
            'request' , RequestItem::all()->where('company_id',$companyid)->count())->with(
            'request_count' , RequestItem::all()->where('company_id',$companyid)
                ->where('status','request')->count())->with(
            'requestOrder_count' , RequestItem::all()->where('company_id',$companyid)
                ->where('status','order')->count())->with(
            'OrderDelivered_count' , Order::all()->where('company_id',$companyid)
                ->where('status_order','delivered')->count())->with(
            'invoices_count' , Order::all()->where('company_id',$companyid)->count())->with(
            'invoices_NOT_pay_count' , lnvoice::all()->where('company_id',$companyid)
                ->where('status_invoice' ,'Not Payment')->count())->with(
            'invoices_pay__count' , lnvoice::all()->where('company_id',$companyid)
                ->where('status_invoice' ,'Payment')->count());
    }
    public function supplier(){
        $iduser = Auth::user()->id;
        $suppliers = Supplier::all()->where('userCreate_id',$iduser)->find('id');
        $supplierid = $suppliers ;
        return view('dashboard.suppliers')->with(
            'request' , RequestItem::all()->where('supplier_id',$supplierid)->count())
            ->with('request_count', RequestItem::all()->where('supplier_id',$supplierid)
            ->where('status','request')->count())
            ->with('requestOrder_count', RequestItem::all()->where('supplier_id',$supplierid)
                ->where('status','order')->count())
            ->with('OrderDelivered_count', Order::all()->where('supplier_id',$supplierid)
                ->where('status_order','delivered')->count());
    }
}
