<?php

namespace App\Http\Middleware;

use App\Company;
use Closure;
use Illuminate\Support\Facades\Auth;

class chechCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $iduser = Auth::user()->id;
        $Company_id = Company::all()->where('userCreate_id',$iduser)->count();
        if($Company_id == 0){
            session()->flash('error','First You Need ta Add Company info');
            return redirect(route('companies.create'));
        }
        return $next($request);
    }
}
