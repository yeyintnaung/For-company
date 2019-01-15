<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ConstructprojectsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('block');

        $this->middleware('NeedToRegister');
    }

    public function get_projects()
    {
        $con_com_data = DB::table('company')->where('user_id', Auth::user()->id)->first();

        switch ($con_com_data->business_hub) {
            case 1 :
                $fr = ['fr4', 'rb4'];
                break;
            case 2:
                $fr = ['fr3', 'rb3'];
                break;
            case 3:
                $fr = ['fr5', 'fr5'];
                break;
            case 4:
                $fr = ['fr1', 'rb2'];
                break;

            case 5:
                $fr = ['fr7', 'fr7'];
                break;

            case 6:
                $fr = ['fr8', 'rb5'];
                break;

            case 7:
                $fr = ['fn1', 'fn2', 'fn3', 'fn4'];
                break;

            case 8:
                $fr = ['fr6', 'fn2', 'fn3', 'fn4'];
                break;
            case 9:
                $fr = ['rb1', 'b1', 'b2', 'b3'];
                break;
            case 10:
                $fr = ['fr8', 'rb5'];
                break;

        }

        $data = DB::connection('mysql_service')->table('for_repair')->where([['city', '=', $con_com_data->city_id], ['close', 0], ['confirm', '=', 'confirmed']])->whereIn('fr_type', $fr);

//        $limit_q=DB::table('user_saw_this_plan')->where('project_id',$data->id)->count();
//        $user_saw_this=DB::table('user_saw_this_plan')->where([['project_id','=',$data->id],['user_id',Auth::user()->id]])->count();

        $darray = [];

        foreach ($data->get() as $d) {
            $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();

            if ($limit_q == $d->quotation) {
                $user_saw_this = DB::table('user_saw_this_plan')->where([['project_id', '=', $d->id], ['user_id', Auth::user()->id]])->count();

                if ($user_saw_this > 0) {
                    $darray[] = $d;

                } else {
                    continue;
                }
            } else {
                $darray[] = $d;
            }

        }
        $dc = collect($darray)->paginate(6);

        return view('user.entra.construct_projects', ['data' => $dc]);
    }



    public function detail($id)
    {
        //to check user already see this project
        $castp = DB::table('see_projects_with_plan')->where([['user_id', '=', Auth::user()->id], ['project_id', '=', $id]])->count();

        if ($castp == 0) {

            //for free plan

            $limit = DB::table('user_get_free_plan')->where('user_id', '=', Auth::user()->id);
            $get_define_point = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();
            $free_plan_data = DB::table('free_plan')->where('id', $limit->first()->free_plan_id)->first();

            if ($limit->count() != 0 and (Carbon::parse($limit->first()->created_at)->addMonth(1) > Carbon::now())) {
                //for free plan
                //check his remaining point and bonus point is greater than project define point
                if (($limit->first()->remaining_point + $limit->first()->increase_point) >= $get_define_point->project_define_point) {
                    // if his remaining point is enough for project define point
                    if (($limit->first()->remaining_point - $get_define_point->project_define_point) > 0) {
                        //get point from his remaining point
                        $new_rem_point = ($limit->first()->remaining_point - $get_define_point->project_define_point);
                        //put bonus point for him
                        $new_bonus_point = $limit->first()->increase_point;
                    } else {
                        //if his remaining point is equal to 0
                        if ($limit->first()->remaining_point == 0) {
                            //get point from his bonus point
                            $new_bonus_point = ($limit->first()->increase_point - $get_define_point->project_define_point);
                            $new_rem_point = 0;
                            $new_bonus_point = $new_bonus_point;
                        } else {
                            //get his remaining point is less than project define point
                            if ($limit->first()->remaining_point < $get_define_point->project_define_point) {
                                $half_reduce_point = $get_define_point->project_define_point - $limit->first()->remaining_point;
                                $aku_point = $limit->first()->increase_point - $half_reduce_point;
                                $new_rem_point = 0;
                                $new_bonus_point = $aku_point;
                            } else {
                                $new_rem_point = $limit->first()->remaining_poin - $get_define_point->project_define_point;
                                $new_bonus_point = $limit->first()->increase_point;

                            }

                        }

                    }
                    $new_bonus_point += $free_plan_data->increase;
                    $new_see_point = $limit->first()->see_point + 1;
                    DB::table('user_get_free_plan')->where('user_id', '=', Auth::user()->id)->update(['remaining_point' => $new_rem_point, 'see_point' => $new_see_point, 'increase_point' => $new_bonus_point]);
                } else {
                    Session::flash('not_permit', 'no');
                    return redirect('entra/construct_projects');
                }
            } else {
                //for buying plan

                Session::flash('expire', 'yes');
                return redirect('entra/con  struct_projects');


            }


            DB::table('see_projects_with_plan')->insert(['user_id' => Auth::user()->id, 'plan' => 'free', 'project_id' => $id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            DB::table('user_saw_this_plan')->insert(['user_id' => Auth::user()->id, 'project_id' => $id, 'created_at' => Carbon::now()]);


            //end for free plan

        }
        $data = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();
        $com_data = DB::table('company')->where('user_id', '=', Auth::user()->id)->first();
        $message_data = DB::connection('mysql_service')->table('message')->where([['post_id', '=', $id], ['com_id', '=', $com_data->id]])->orderBy('created_at', 'desc')->get();
        return view('user.entra.construct_project_detail', ['data' => $data, 'message_data' => $message_data]);
    }

    public function send_message_form($post_id)
    {
        $post_data = DB::connection('mysql_service')->table('for_repair')->where('id', $post_id)->first();
        $user_data = DB::connection('mysql_service')->table('users')->where('id', $post_data->user_id)->first();
        return view('user.entra.mails.construct_mail.send_msg', ['post_data' => $post_data, 'user_data' => $user_data]);

    }

    public function send_message(Request $request)
    {
        $success = DB::connection('mysql_service')->table('message')->insert(['post_id' => $request->post_id, 'from_user' => 'com', 'user_id' => $request->user_id, 'com_id' => $request->com_id, 'message' => $request->message, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        $com_data = DB::table('company')->where('user_id', '=', Auth::user()->id)->first();
        $pdata = DB::connection('mysql_service')->table('for_repair')->where('id', $request->post_id)->first();
        DB::connection('mysql_service')->table('relation_com_and_user')->insert(['com_id' => $request->com_id, 'post_id' => $request->post_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        if ($success) {
            Session::flash('success', 'Successfully send');
            return redirect('entra/construct_project_detail/' . $request->post_id);
        }
    }

    public function construct_message_view($mid)
    {
        $mdata = DB::connection('mysql_service')->table('message')->where('id', $mid)->first();
        $post_data = DB::connection('mysql_service')->table('for_repair')->where('id', $mdata->post_id)->first();
        $user_data = DB::connection('mysql_service')->table('users')->where('id', $mdata->user_id)->first();
        return view('user.entra.mails.construct_mail.mail_view', ['data' => $mdata, 'post_data' => $post_data, 'user_data' => $user_data]);

    }
}
