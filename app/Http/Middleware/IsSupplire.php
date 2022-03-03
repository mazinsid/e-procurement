<?php

namespace App\Http\Middleware;


use App\Supplier;
use Closure;
use Illuminate\Support\Facades\Auth;
class IsSupplire
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
      $iduser =  auth()->user()->id;
         $supplier_id = Supplier::all()->where('userCreate_id',$iduser)->count();
        if($supplier_id == 0){
            session()->flash('error','First You Need ta Add supplier info');
            return redirect(route('suppliers.create'));

        }

        return $next($request);

    }
}
