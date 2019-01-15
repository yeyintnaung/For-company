<?php

namespace App\Http\Controllers;

use App\Recommend;
use App\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class RecommendController extends Controller
{
    public function index()
    {
        return view('recommend.index');
    }
    //city , business_hub form (index form) [current painting]
    public function recommend_form1(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'city_id' => 'required|min:1',
                'business_hub' => 'required|min:1|max:20',
            ]);

        if ($validator->fails()) {
            return "error";
        }

        $city_id= $request->city_id;
        $business_hub = $request->business_hub;

        session()->put('city_id', $city_id);
        session()->put('business_hub', $business_hub);

        if (session()->has('city_id') & session()->has('business_hub')) {
            return "true";
        }
        else {
            return "false";
        }
      
    }
    //new building or old building ? radio button
    public function recommend_form2(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'new_old' => 'required',
            ]);

        if ($validator->fails()) {
            return "error";
        }
        
        $new_old= $request->new_old;
        session()->put('new_old', $new_old);

        if (session()->has('new_old')) {
            $value = $request->session()->get('new_old');
            if($value == "new")
            {
                 return "true. form 3";
            }
            else{
                return "true. form 2.1";
            }
        }
        else {
            return "false";
        }
    }
    //if old building, is it an historical building ? radio button
    public function recommend_form2_1(Request $request)
    {
        //historical building ? yes = 1 : no = 0
        $validator = Validator::make($request->all(),
        [
            'historical' => 'required|numeric|min:0|max:1',
        ]);

        if ($validator->fails()) {
            return "error";
        }
        
        $historical = $request->historical;
        session()->put('historical', $historical);

        if (session()->has('historical')) {
            $value = $request->session()->get('historical');
            return "true";
        }
        else {
             return "false";
        }
    }
    //do u wanna paint interior side or exterior side or both ? radio button
    public function recommend_form3(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'in_ex_both' => 'required',
            ]);

        if ($validator->fails()) {
            return "error";
        }
        
        
        $in_ex_both= $request->in_ex_both;
        session()->put('in_ex_both', $in_ex_both);

        if (session()->has('in_ex_both')) {
            return "true";
        }
        else {
            return "false";
        }
    }
  //   building type => HOME [condo, apartment , lone_chin , bagalo] / INDUSTRY [ office, shop, hotel, factory, workshop, store, monastry] all radio buttons
    public function recommend_form4(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'building_type' => 'required',
            ]);

        if ($validator->fails()) {
            return "error";
        }
        
        $building_type= $request->building_type;
        session()->put('building_type', $building_type);

        if (session()->has('building_type')) {
            return "true";
        }
        else {
            return "false";
        }
    }
    // what type of item do u wanna paint ? ceiling, walls, doors, floor, kyee_khway/baung, cabinets, steel structure or other [checkboxes] 
    public function recommend_form5(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'item' => 'required',
            ]);

        if ($validator->fails()) {
            return "error";
        }
        
        $item= $request->item;
        session()->put('item', $item);

        if (session()->has('item')) {
            return "true";
        }
        else {
            return "false";
        }
    }
    //room type ? living room, bedroom, bathroom, dining room, toilet, kitchen, wa_yan_tar
    public function recommend_form6(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'room' => 'required',
            ]);

        if ($validator->fails()) {
            return "error";
        }
                
        $room= $request->room;
        session()->put('room', $room);

        if (session()->has('room')) {
            return "true";
        }
        else {
             return "false";
        }
    }
    //total area and sqft type[1sqft or 10sqft ?]
    public function recommend_form7(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'sqft' => 'required',
                'area' => 'required|numeric|min:1',
            ]);

        if ($validator->fails()) {
            return "error";
        }
        
        $sqft= $request->sqft;
        $area= $request->area;
        session()->put('sqft', $sqft);
        session()->put('area', $area);

        if (session()->has('sqft') && session()->has('area')) {
            return "true";
        }
        else {
            return "false";
        }
    }

    public function recommend_form8(Request $request)
    { //supply paint ? yes = 1 : no = 0
        $validator = Validator::make($request->all(),
            [
                'yes_no' => 'required|numeric|min:0|max:1',
            ]);

        if ($validator->fails()) {
            return "error";
        }
          
        $yes_no= $request->yes_no;
        session()->put('yes_no', $yes_no);

        if (session()->has('yes_no')) {
            return "true";
        }
        else {
            return "false";
        }
    }
    //when do u wanna start ur painting project ? Project duration ?
    public function recommend_form9(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'starting_date' => 'required',
                'period' => 'required',
            ]);

        if ($validator->fails()) {
            return "error";
        }
        
        $starting_date= $request->starting_date;
        $period= $request->period;
        session()->put('starting_date', $starting_date);
        session()->put('period', $period);

        if (session()->has('starting_date') && session()->has('period')) {
           return "true";
        }
        else {
            return "false";
        }
    }
    //project address
    public function recommend_form10(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'project_location' => 'required|min:15|max:600',
            ]);

        if ($validator->fails()) {
            return "error";
        }
          
        $project_location= $request->project_location;
        session()->put('project_location', $project_location);

        if (session()->has('project_location')) {
            return "true";
        }
        else {
            return "false";
        }
    }
    //project description
    public function recommend_form11(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'project_description' => 'required|min:12|max:3330',
        ]);

        if ($validator->fails()) {
            return "error";
        }
      
        $project_description= $request->project_description;
        session()->put('project_description', $project_description);

        if (session()->has('project_description')) {
            return "true";
        }
        else {
            return "false";
        }
    }
    // attachments <user can skip this form>
    public function recommend_form12(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'attachment' => 'mimes:xla,xlam, xls,xlsb,xlsm,xlsx,xlt,xltm,xltx,xlw'
        ]);

        if ($validator->fails()) {
            return "error";
        }
      
        $attachment= $request->attachment;
        session()->put('attachment', $attachment);

        if (session()->has('attachment')) {
            return "true";
        }
        else {
            return "false";
        }
    }   
    //if we call you, when will u be ok ?
    public function recommend_form13(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'contactable_time' => 'required',
        ]);
        
        if ($validator->fails()) {
            return "error";
        }

        $contactable_time= $request->contactable_time;
        session()->put('contactable_time', $contactable_time);

        if (session()->has('contactable_time')) {
            return "true";
        }
        else {
            return "false";
        }
    }
    //user's facts
    public function recommend_form14(Request $request)
    {
         $validator = Validator::make($request->all(),
        [
            'name' => 'required|min:2|max:120',
            'email'=>'required',
            'phone' => 'required|numeric',
            'address' => 'required|max:1000'
        ]);
        
        if ($validator->fails()) {
            return "error found";
        }
        session()->put('city_id', '45');
        session()->put('new_old', 'old');
        session()->put('historical', '1');
        session()->put('in_ex_both', 'both');
        session()->put('building_type', '7');
        session()->put('item', '1');
        session()->put('room', '5');
        session()->put('sqft', '10sqft');
        session()->put('area', '525');
        session()->put('starting_date', '2020-01-12');
        session()->put('period', 'within a year');
        session()->put('yes_no', '0');
        session()->put('project_location', 'B2, bahan twnship, ygn');
        session()->put('project_description', 'The Mandalay City Development Committee ကေခၚယူေနသည့္ ေရစုေရလြဲကန္ တည္ေဆာက္ဖို႔ Projects ၾကီး ျဖစ္ပါသည္။ Deadline for Submission of Bids 23/07/2018 at (3:00 PM) • Improvement of the existing production tubewells; • Construction of a chlorination house at BPS 10 and Kyantan sites; • Construction of a reservoir and pumping station at Kyantan site; • Rehabilitation of BPS 10 pumping system; • Replacement of existing and installation of new distribution networks (around 20 km), including service connections. 1. The Mandalay City Development Committee has received financing from the Agence Française de Développement (AFD). Part of this financing will be used for payments under the Contract named above. The eligibility rules and procedures of AFD will govern the bidding processes. 2. The Mandalay City Development Committee (MCDC) (“the Employer”) invites sealed bids from eligible Bidders for the construction and completion of Amarapura Water Works which includes: 3. Interested Bidders must demonstrate their specific experiences or capabilities by their: Financial situation: • Historical Financial Performance • Average Annual Construction Turnover • Availability of Financial Resources- Cash Flow Capacity Construction Experience: • Contracts of Similar Size and Nature • Construction Experiences in key Activities The qualification criteria are more completely described in the Bidding Document. 4. National Competitive Bidding (NCB) will be conducted in accordance with AFD’s Single-Stage: One-Envelope bidding procedure and is open to all Bidders from eligible countries as described in the Bidding Document. 5. To purchase the Bidding Documents in English, eligible bidders should write to the address below requesting the Bidding Documents for contract named above, pay a non-refundable fee of eighty-five thousand Myanmar Kyats (85 000) MMK in cash to the Project Management Office located in MCDC compound, 26th street, Mandalay. 6. Deliver your bid to the address below on or before the said deadline for submission of Bids together with a Bid Security (15 000 Euros) as described in the Bidding Documents. 7. A pre-bid meeting will be organized on 14/06/2018 at (9:00AM) in MCDC compound. 9. Mandalay City Development Committee (MCDC) will not be responsible for any costs or expenses incurred by bidders in connection with the preparation or delivery of bids. ');
        session()->put('contactable_time' , 'night');
        session()->put('attachment', 'unops.xlsx');

        $name= $request->name;
        $email= $request->email;
        $phone= $request->phone;
        $address= $request->address;
        session()->put('name', $name);
        session()->put('email', $email);
        session()->put('phone', $phone);
        session()->put('address', $address);

        if (session()->has('name')) {
            $city_id = session()->get('city_id');
           // $business_hub = session()->get('business_hub');
            $new_old = session()->get('new_old');
            $in_ex_both= session()->get('in_ex_both');
            $building_type = session()->get('building_type');
            $item = session()->get('item');
            $room = session()->get('room');
            $sqft = session()->get('sqft');
            $area = session()->get('area');
            $yes_no = session()->get('yes_no');
            $starting_date = session()->get('starting_date');
            $period = session()->get('period');
            $project_location = session()->get('project_location');
            $attachment = session()->get('attachment');
            $contactable_time = session()->get('contactable_time');
            $name = session()->get('name');
            $email = session()->get('email');
            $phone = session()->get('phone');
            $address = session()->get('address');
            $historical = session()->get('historical');
            $project_description = session()->get('project_description');
           
           /*  $ok = Recommend::create([ 'token'=>$token,'user_name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address,
                                     'contactable_time' => $contactable_time, 'description' => $project_description, 
                                     'new_old' => $new_old, 'historical' => $historical, 'in_ex_both' => $in_ex_both, 
                                     'building_type' => $building_type, 'painting_item' => $item, 'room_type' => $room, 
                                     'project_location' => $project_location, 'city_id' => $city_id, 'area' => $area,
                                     'sqft' => $sqft, 'supply_paint' => $yes_no, 'starting_date' => $starting_date,
                                     'period' => $period, 'attachment' => $attachment, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
                                       ]); */
            
            $recommend = new Recommend;
            $recommend -> user_name = $name;
            $recommend -> email = $email;
            $recommend -> phone = $phone;
            $recommend -> address = $address;
            $recommend -> contactable_time = $contactable_time;
            $recommend -> project_description = $project_description;
            $recommend -> new_old = $new_old;
            $recommend -> historical = $historical;
            $recommend -> in_ex_both = $in_ex_both;
            $recommend -> building_type = $building_type;
            $recommend -> painting_item = $item;
            $recommend -> room_type = $room;
            $recommend -> project_location = $project_location;
            $recommend -> city_id = $city_id;
            $recommend -> area = $area;
            $recommend -> sqft = $sqft;
            $recommend -> supply_paint = $yes_no;
            $recommend -> starting_date = $starting_date;
            $recommend -> period = $period;
            $recommend -> attachment = $attachment;
            $recommend -> created_at = Carbon::now();
            $recommend -> updated_at = Carbon::now();

            $ok = $recommend->save();

            $project_id = $recommend->id;
                                       
            if($ok)
            {
                    $ok2 = Guest::create([ 'phone' => $phone, 'project_id'=> $project_id, 'name' => $name, 'address' => $address, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
                                               if($ok2)
                                               {
                                                   echo "success for guest.<hr>";
                                               }            
                
                    echo "<h1>Successfully added to database</h1>";
                echo "<br>"."Project ID: ".$project_id."<br>Name :".$name." <br>"."Email :".$email." <br>"."Phone :".$phone." <br>"."Address :".$address."Contactable time :".$contactable_time." <br>";  
                echo "City :".$city_id." <br>"."New or Old :".$new_old."<br>"."Historical ? :".$historical." <br>"."Interior or exterior or both :".$in_ex_both." <br>"."Building type :".$building_type." <br>"."Item :".$item." <br>"."Room :".$room;  
                echo "<br>"."one sqft or ten sqft ? :".$sqft."<br>"."Area :".$area."<br>"."Supply Paint ? :".$yes_no."<br>"."Startind date :".$starting_date."<br>"."Project period :".$period."<br>"."Project location :".$project_location."<br>"."Attachment :".$attachment;
               
            }
            else{
                echo "<h1>Not Successful</h1>";
            }
        
        }
        else {
            return "false";
        }
    }
}
