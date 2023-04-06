<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\Profilelevel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $event = User::where('status','1')
                ->whereHas('roles', function($q){
                $q->where('name', 'user');
                })->get();
        $country = Country::all();
        $profile = Profilelevel::all();
        return view('admin.user.index',compact('event','country','profile'));
    }

    public function userList(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = (int)$request->get('length');
        $page = ($request->start / $length) + 1;
        $search = $request->search['value'];

        $members = User::whereHas('roles', function($q){
            $q->where('name', 'user');
            })->where('status','1')->with(['countries','profiles'])->get();        
        
        // User::where('status','1')->whereHas('roles', function($q){
        //     $q->where('name', 'user');
        //     })->with(['countries','profiles'])->get();

        // if ($search != "") {
        // $members = $members
        //     ->where('users.full_name', 'like', '%' . $search . '%')
        //     ->orWhere('users.email', 'like', '%' . $search . '%')
        //     ->orWhere('users.city', 'like', '%' . $search . '%')  ;
        // }

        if (!isset($request->order)) {
            $members = User::whereHas('roles', function($q){
                $q->where('name', 'user');
                })->where('status','1')->with(['countries','profiles'])->orderby('id', 'desc');
        } else {
            $columns = $request->order[0]['column'];
            $order = $request->order[0]['dir'];
            $name_field = $request->columns[$columns]['data'];
            if ($name_field == "user_name" || $name_field == "user_email" || $name_field == "user_country" || $name_field == "user_city" || $name_field == "subscription" ) {
                if ($name_field != "") {
                    if ($name_field == "user_name") {
                        $field = "fullName";
                    }

                    if ($name_field == "user_email") {
                        $field = "email";
                    }

                    if ($name_field == "user_country") {
                        $field = "country";
                    }

                    if ($name_field == "user_city") {
                        $field = "city";
                    }

                    if ($name_field == "subscription") {
                        $field = "profile";
                    }

                    $members = User::whereHas('roles', function($q){
                        $q->where('name', 'user');
                        })->where('status','1')->with(['countries','profiles'])->orderBy($field, $order);
                }
            } else {
                $members = User::whereHas('roles', function($q){
                    $q->where('name', 'user');
                    })->where('status','1')->with(['countries','profiles'])->orderBy($name_field, $order);
            }

        }
        $members = User::whereHas('roles', function($q){
            $q->where('name', 'user');
            })->where('status','1')->with(['countries','profiles'])->paginate($length, ['*'], 'page', $page);       

          
        foreach ($members as $key => $value) {
            $value->index = $key + 1;
            $value->user_name = ucfirst(@$value->fullName);
            $value->user_email = ucfirst(@$value->email);
            $value->phone_number = @$value->country_code .''.@$value->phone;
            $value->user_country = ucfirst(@$value->countries->name);
            $value->user_city = ucfirst(@$value->city);
            $value->subscriptionPlan = ucfirst(@$value->profiles->name);
            $value->action =
                '<div>
                    <a class="btn btn-success btn-sm edit-user" data-slug="' . $value['slug'] . '"  data-id="' . $value['id'] . '" data-toggle="modal" data-target="#edit-user" id="editUserDetail"><i class="bx bx-pencil text-white"></i></a>
                    <a class="btn btn-danger btn-sm delete-user" data-slug="' . $value['slug'] . '"  data-id="' . $value['id'] . '"><i class="bx bx-trash-alt text-white"></i></a>
                </div>';
        }
        $members = (array)json_decode(json_encode($members));

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $members['total'],
            'recordsFiltered' => $members['total'],
            'data' => $members['data'],
        );
        echo json_encode($data);
    }

    // edit user 
    public function edit(Request $request)
    {
        $user = User::findOrfail($request->id);
        return response()->json($user);
    }

    // update user details 
     public function update(Request $request)
     {
        // dd($request->editUserId);
        $user = User::where('id',$request->editUserId)->first();
        $user->fullName = $request->editUserName;
        $user->Email = $request->editUserEmail;
        $user->Phone = $request->editUserPhone;
        $user->Country = $request->editUserCountry;
        $user->City = $request->editUserCity;
        $user->subscriptionPlan = $request->editUserProfile;
        if($user->update()){
            return response()->json(['ResponseCode'=>1,'ResponseText'=>"User detail Update Successfully"],200);
        }else{
            return response()->json(['ResponseCode'=>0,'ResponseText'=>"Something Went Wrong."],200);
        }
     }
    // delete user 
    public function destroy(Request $request){

        $user = User::where('id',$request->id)->delete();
        if($user){          
                return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Model Deleted Successfully.' ], 200);
                     
        }else{  
            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
        }

    }
}
