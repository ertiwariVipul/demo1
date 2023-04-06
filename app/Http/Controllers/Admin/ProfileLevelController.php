<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileLevel;
use Illuminate\Support\Facades\Validator;

class ProfileLevelController extends Controller
{
    // view profile level 
    public function index(){

        $profile_levels = ProfileLevel::where('status',1)->get();
        return  view('admin.setting.profilelevel.index',compact('profile_levels'));
    }

    // profile level list 
    public function profileLevelList(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = (int)$request->get('length');
        $page = ($request->start / $length) + 1;
        $search = $request->search['value'];

        $members = ProfileLevel::where('status',1);
        if ($search != "") {
            $members = $members->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%');           
        }
        if (!isset($request->order)) {
            $members = $members->orderby('id', 'desc');
        } else {
            $columns = $request->order[0]['column'];
            $order = $request->order[0]['dir'];
            $name_field = $request->columns[$columns]['data'];
            if ($name_field == "profile_name" || $name_field == "profile_desc" ) {
                if ($name_field != "") {
                    if ($name_field == "profile_name") {
                        $field = "name";
                    }
                    if ($name_field == "profile_desc") {
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
            $value->id = $key + 1;
            $value->profile_name = ucfirst($value->name);
            $value->profile_desc = ucfirst($value->description);
            $value->action =
                '<div>
                <a class="btn btn-success btn-sm edit_profile " data-slug="' . $value['slug'] . '" ><i class="bx bx-pencil text-white"></i></a>
                <a class="btn btn-danger btn-sm deleteProfileLavel " data-slug="' . $value['slug'] . '"><i class="bx bx-trash-alt text-white"></i></a>
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

    // Edit profile level 
    public function editProfile(Request $request)
    {
        $profileLevels = ProfileLevel::where('slug',$request->slug)->first();

        return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Profile Level Fetched Successfully.', 'ResponseData' => $profileLevels], 200);
    }
    
    // Update profile level 
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'profile_name'=>'required',
            'profile_desc'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => $validator->messages()], 200);;
        } 
        $profileSlug = str_slug($request->profile_name,"");

        $profileLevels = ProfileLevel::where('slug',$request->profile_slug)->update([
            "name" => $request->profile_name , 
            "description" => $request->profile_desc,
            "slug"=>$profileSlug
        ]);

        if($profileLevels){
            return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Profile Level Updated Successfully.', 'ResponseData' => $profileLevels], 200);
        }else{
            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
        }

    }
    

    //    Delete profile level l
    public function deleteProfile(Request $request)
    {
        $profileLevels = ProfileLevel::where('slug',$request->slug)->update(["status"=>0]);

        if($profileLevels){
            return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Profile Level Deleted Successfully.', 'ResponseData' => $profileLevels], 200);
        }else{
            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Profile Level not Deleted Successfully.', 'ResponseData' => $profileLevels], 500);
        }

    }

    // store profile level 
    public function addProfile(Request $request)
    { 

        $validator = Validator::make($request->all(),[
            'profile_name'=>'required',
            'profile_desc'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => $validator->messages()], 200);;
        } 

        $profileLevels = new ProfileLevel;
        $profileLevels->name = $request->profile_name;
        $profileLevels->description = $request->profile_desc;
        $profileLevels->slug = str_slug($request->profile_name,"");
        $profileLevels->status = 1;
        $profileLevels->save();
        return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Profile Level Added Successfully.', 'ResponseData' => $profileLevels], 200);

    }
}