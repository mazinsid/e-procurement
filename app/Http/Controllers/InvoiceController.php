<?php

namespace App\Http\Controllers;

use App\Company;
use App\Order;
use App\RequestItem;
use App\Supplier;
use Illuminate\Http\Request;
use App\lnvoice;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCompany')->except('store')->except('completed');
    }

    public function payment(lnvoice $lnvoice){

        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        $lnvoice->status_invoice = "Payment";
        $lnvoice->save();

        session()->flash('success',' successfully');
        return view('invoices.index')->with('invoices',lnvoice::all()->where('company_id',$companyid)
            ->where('status_invoice' ,'Not Payment'));
    }

    public function index(){
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        return view('invoices.index')->with('invoices',lnvoice::all()->where('company_id',$companyid)
            ->where('status_invoice' ,'Not Payment'));
    }

    public function completed(){
        $iduser = Auth::user()->id;
        $suppliers = Supplier::all()->where('userCreate_id',$iduser);
        foreach ($suppliers as $supplier) {

            $supplierid = $supplier->id;
        }
        return view('invoices.invoiceCompleted')->with('invoices',lnvoice::all()->where('supplier_id',$supplierid)
            ->where('status_invoice' ,'Payment'));
    }

    public function show(){
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        return view('invoices.index')->with('invoices',lnvoice::all()->where('company_id',$companyid)
            ->where('status_invoice' ,'Payment'));
    }
    public function store(Request $request){
        lnvoice::create([
            'order_id' => $request->order_id ,
            'supplier_id' => $request->supplier_id,
            'company_id' => $request->company_id,
        ]);
        $requestItem = Order::all()->find($request->order_id);
        $status = 'invoice';
        $requestItem->update([
            'status_order' => $status
        ]);
        session()->flash('success','create user successfully');
        return redirect(route('order.show'));
    }

}
