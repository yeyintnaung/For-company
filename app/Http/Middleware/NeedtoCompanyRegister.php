<?php

namespace App\Http\Middleware;

use App\Company;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NeedtoCompanyRegister
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
        $company_count = Company::where('user_id', Auth::user()->id)->count();
        if ($company_count == 0) {
            return redirect('company_register_form');
        }
        $company_data = Company::where('user_id', Auth::user()->id)->first();
        if($company_data->status < 2) {
            Session::flash('need_to_register','Please register your company');

            if ($company_data->status == 1) {

                return redirect('company_register_form_two');
            } elseif ($company_data->status == 2) {
                return redirect('company_register_form_three');

            }

        }else {
            return $next($request);
        }
    }
}
