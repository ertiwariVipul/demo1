<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        
        $event = Event::count();
        $users =  User::whereHas('roles', function($q){
            $q->where('name', 'user');
            })->with('countries','profiles')->get();

        $models = User::whereHas('roles', function($q){
            $q->where('name', 'model');
            })->with('countries','model_details')->orderBy('users.created_at','desc')->get();

        return view('admin.dashboard.index',compact('users','models','event'));
    }

    
    public function recentEventList(Request $request){
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = (int)$request->get('length');
        $page = ($request->start / $length) + 1;
        $search = $request->search['value'];
        $members = Event::where('status','1')->where('date', Carbon::today()->toDateTimeString());
        if ($search != "") {
        $members = $members
            ->where('name', 'like', '%' . $search . '%')->orWhere('location', 'like', '%' . $search . '%')->orWhere('type', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');      
        }
        if (!isset($request->order)) {
            $members = $members->orderby('id', 'desc');
        } else {
            $columns = $request->order[0]['column'];
            $order = $request->order[0]['dir'];
            $name_field = $request->columns[$columns]['data'];
            if ($name_field == "event_name" || $name_field == "event_location" || $name_field == "event_type" || $name_field == "event_desc" ) {
                // $members = $members->leftJoin('users', 'users.id', '=', 'jobseeker_timesheet_detail.jobseeker_id');
                if ($name_field != "") {
                    if ($name_field == "event_name") {
                        $field = "name";
                    }
                    if ($name_field == "event_location") {
                        $field = "location";
                    }
                    if ($name_field == "event_type") {
                        $field = "type";
                    }
                    if ($name_field == "event_desc") {
                        $field = "description";
                    }

                    $members = $members->orderBy($field, $order);
                }
            } else {
                $members = $members->orderBy($name_field, $order);
            }

        }
        $members = $members->paginate($length, ['*'], 'page', $page);
       

        foreach ($members as $key => $value) {


            $value->index = $key + 1;
            $value->event_name = '<div>
            <a class="" href="'.route('admin.event.eventDetails').'"> '.ucfirst($value->name).' </a>
        </div>';
            $value->event_location = ucfirst($value->location);
            $value->event_no_of_girls = ucfirst($value->no_of_girls);
            $value->event_date = ucfirst($value->date);
            $value->event_type = ucfirst($value->type);

            $value->event_status = ucfirst($value->event_status);
            if($value->event_status==0){
                $value->event_status =    '<button class="btn btn-warning waves-effect waves-light change-event-status" data-toggle="modal" data-id="0"  data-eventId="'.$value->id.'" data-target=".change-event-status-event">
                                        <i class="bx bx-hourglass bx-spin font-size-16 align-middle mr-2"></i> Pending
                                    </button>';
            }else if($value->event_status == 1){
                $value->event_status =    '<button class="btn btn-success waves-effect waves-light change-event-status" data-toggle="modal" data-id="1" data-eventId="'.$value->id.'" data-target=".change-event-status-event">
                                        <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Accepted
                                    </button>';
            }else if($value->event_status == 2){
                $value->event_status =    '<button class="btn btn-danger waves-effect waves-light change-event-status" data-toggle="modal" data-id="2" data-eventId="'.$value->id.'" data-target=".change-event-status-event">
                                        <i class="bx bx-block font-size-16 align-middle mr-2"></i> Rejected
                                    </button>';
            }

       

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
    public function dashboardUserList(Request $request){
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = (int)$request->get('length');
        $page = ($request->start / $length) + 1;
        $search = $request->search['value'];

        $members = User::where('status','1')->where('user_role',2)->with('countries','profiles');
        // if ($search != "") {
        // $members = $members
        //     ->where('users.full_name', 'like', '%' . $search . '%')
        //     ->orWhere('users.email', 'like', '%' . $search . '%')
        //     ->orWhere('users.city', 'like', '%' . $search . '%')  ;
        // }
        if (!isset($request->order)) {
            $members = $members->orderby('id', 'desc');
        } else {
            $columns = $request->order[0]['column'];
            $order = $request->order[0]['dir'];
            $name_field = $request->columns[$columns]['data'];
            if ($name_field == "user_name" || $name_field == "user_email" || $name_field == "user_country" || $name_field == "user_city" || $name_field == "subscription" ) {
                if ($name_field != "") {
                    if ($name_field == "user_name") {
                        $field = "full_name";
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

                    $members = $members->orderBy($field, $order);
                }
            } else {
                $members = $members->orderBy($name_field, $order);
            }

        }
        $members = $members->paginate($length, ['*'], 'page', $page);
       

        foreach ($members as $key => $value) {

            $value->index = $key + 1;
            $value->user_name = ucfirst($value->full_name);
            $value->user_email = ucfirst($value->email);
            $value->phone_number = $value->country_code .''.$value->phone;
            $value->user_country = ucfirst($value->countries->name);
            $value->user_city = ucfirst($value->city);
            $value->subscription = ucfirst($value->profiles->name);
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

    public function update(Request $request)
    {
        $request->validate([
            'userFullName'=>'required',
            'userEmail'=>'required',
            'userPhone'=>'required',
        ]);
        $user = User::find(Auth::user()->id);
        $user->fullName = $request->userFullName;
        $user->email = $request->userEmail;
        $user->phone = $request->userPhone;
        if($request->image){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->storeAs('public/adminAssets/uploads/user',$name);
            $user->profile = $name;
        }
        if($user->update()){
            return redirect(route('admin.index'));
        }

    }
}
