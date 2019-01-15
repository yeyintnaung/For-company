<?php

namespace App\Http\Controllers\Auth;

use App\FreePlan;
use App\Freeplanforuser;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'type'=>'required|numeric|min:1',


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
            $current_user_data=User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'permission'=>'true',
                'role'=>'user',
                'type'=>$data['type'],
            ]);
         $free_plan_data=FreePlan::where('id',1)->first();
         DB::table('user_block')->insert(['user_id'=>$current_user_data->id,'admin_id'=>6,'circum'=>'unblock','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
         Freeplanforuser::create(['user_id'=>$current_user_data->id,'start_date'=>Carbon::now(),'free_plan_id'=>1,'see_point'=>0,'increase_point'=>0,'remaining_point'=>0,'end_date'=>Carbon::now()->addMonth(1)]);

        return $current_user_data;
    }
}
