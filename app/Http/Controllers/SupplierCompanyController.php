<?php

namespace App\Http\Controllers;

use App\Company;
use App\Suppliers_Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierCompanyController extends Controller
{
    public function index(){

        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {

            $companyid = $company->id;
        }
        return view('companies.CompanySuppliers')->with('suppliers',Suppliers_Company::all()->where('company_id',$companyid));
    }
    public function store(Request $request){
        $iduser = Auth::user()->id;
        $companies = Company::all()->where('userCreate_id',$iduser);
        foreach ($companies as $company) {
            $companyid = $company->id;
        }
        $suppliers_company =   Suppliers_Company::all()->where('company_id',$companyid)
            ->where('supplier_id',$request->supplier_id)->count();
        if ($suppliers_company == 0) {
            Suppliers_Company::create([
                'supplier_id' => $request->supplier_id,
                'company_id' => $companyid
            ]);
            session()->flash('success', 'create Suppliers successfully');
        }else{
            session()->flash('error', 'Supplier on ready Adding');
        }
        return redirect(route('companies.suppliers'));
    }
    public function destroy($id)
    {
//        dd($id);
      Suppliers_Company::destroy($id);
        return redirect(route('companies.suppliers'));
    }
}
