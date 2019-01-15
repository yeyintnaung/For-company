<?php

namespace App\Policies;

use App\Bussinessplan;
use App\Company;
use App\Plans;
use App\User;

use Carbon\Carbon;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PlanslimitPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

   public function create()
    {
      if(Carbon::now() < Carbon::parse(Auth::user()->created_at)->addDays(15))
      {
        $plan_count=22;
      }
      else
      {
        if(Plans::where('user_id',Auth::user()->id)->count() == 0)
        {
          $plan_count=0;
        }
        else
        {
           $plan_count=Plans::where('user_id',Auth::user()->id)->first()->create_business_plan;
         }
       }
         $get_com_data=Company::where('user_id',Auth::user()->id)->first();
         $business_plan_count=Bussinessplan::where('company_id',$get_com_data->id)->count();

         return $business_plan_count < $plan_count;


    }
}