<?php

namespace App\Http\Controllers\Admin;

use Hash;
use View;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Language;
use App\Models\Category;
use App\Models\ModelVisa;
use App\Models\ModelDetails;
use App\Models\ModelCategory;
use App\Models\ProfileLevel;
use App\Models\ModelImage;
use App\Models\ModelLanguage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Exceptions\JWTException;

class ModelController extends Controller
{
    public function index(){
        $profileLevelList = ProfileLevel::all();
        $categoryList = Category::all();
        $countryList = Country::all();
        $languageList = Language::all();
        return view('admin.model.index',compact('profileLevelList','categoryList','countryList','languageList'));
    }

    public function list(Request $request){
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = (int)$request->get('length');
        $page = ($request->start / $length) + 1;
        $search = $request->search['value'];

        $members = User::whereHas('roles', function($q){
                    $q->where('name', 'model');
                    })->where('status','1')->with(['model_details','countries'])->get();
     
        if ($search != "") {

        $members = $members->where(function ($q) use ($search) {
            $q->where('fullName', 'like', '%' . $search . '%')
            ->orWhere('city', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        if (!isset($request->order)) {
            $members = User::whereHas('roles', function($q){
                $q->where('name', 'model');
                })->with(['model_details','countries'])->orderby('id', 'desc');
        }else {
            $columns = $request->order[0]['column'];
            $order = $request->order[0]['dir'];
            $name_field = $request->columns[$columns]['data'];

            if ($name_field == "model_name" || $name_field == "email_address" || 
                $name_field == "country" || $name_field == "city" || $name_field == "status") {

                if ($name_field != "") {
                    if ($name_field == "model_name") {
                        $field = "fullName";
                    }
                    if ($name_field == "email_address") {
                        $field = "email";
                    }
                    if ($name_field == "country") {
                        $field = "country";
                    }
                    if ($name_field == "city") {
                        $field = "city";
                    }
                    if ($name_field == "status") {
                        $field = "status";
                    }

                    $members = User::whereHas('roles', function($q){
                        $q->where('name', 'model');
                        })->with(['model_details','countries'])->orderBy($field, $order);
                }
            } else {
                $members = User::whereHas('roles', function($q){
                    $q->where('name', 'model');
                    })->with(['model_details','countries'])->orderBy($name_field, $order);
            }

        }
        $members = User::whereHas('roles', function($q){
            $q->where('name', 'model');
            })->with(['model_details','countries'])->paginate($length, ['*'], 'page', $page);

            foreach ($members as $key => $value) {
            $value->index = $key + 1;
            $value->model_name = ucfirst($value->fullName);
            $value->email_address = ucfirst($value->email);
            $value->mobile_phone = ucfirst($value->phone);
            $value->country = ucfirst(@$value->countries->name);
            $value->profile_level = ucfirst(@$value->model_details->profile_level->name);
            $value->city = ucfirst($value->city);
            $value->status = ucfirst($value->status);
            if(@$value->model_details->isAccepted == 0){
                $value->status =    '<span class="badge badge-soft-warning font-size-12 p-2 cursor-pointer  changeModelStatus" data-value="Pending" data-toggle="modal" data-id="'.$value->id.'" data-target="">
                                        Pending
                                    </span>';
            }else if(@$value->model_details->isAccepted == 1){
                $value->status =    '<span class="badge badge-soft-success font-size-12 p-2 cursor-pointer changeModelStatus" data-value="Accepted" data-toggle="modal"  data-id="'.$value->id.'" data-target="">
                                        Accepted
                                    </span>';
            }else if(@$value->model_details->isAccepted == 2){
                $value->status =    '<span class="badge badge-soft-danger font-size-12 p-2 cursor-pointer changeModelStatus" data-value="Rejected" data-toggle="modal"  data-id="'.$value->id.'" data-target="">
                                        Rejected
                                    </span>';
            }
            $value->action =
                '<div>
                    <a class="btn btn-success btn-sm edit-model" data-slug="' . $value['slug'] . '"  data-id="' . $value['id'] . '" data-toggle="modal" data-target=".edit-model-modal"><i class="bx bx-pencil text-white"></i></a>
                    <a class="btn btn-danger btn-sm delete-model" data-slug="' . $value['slug'] . '"  data-id="' . $value['id'] . '"><i class="bx bx-trash-alt text-white"></i></a>
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

    public function store(Request $request){
        
        try{

            $modelSlug = str_slug($request->fullName,"");

            $user = new User;
            $user->fullName = $request->fullName;
            $user->email = $request->email;
            $user->phone = $request->mobile;
            $user->password = Hash::make($modelSlug);
            $user->country = $request->country;
            $user->city = $request->city;
            $user->status = 1;
            $user->slug = $modelSlug;
            $user->assignRole(Role::where('name','model')->first());

            if($user->save()){

                $model_details = new ModelDetails;
                $model_details->userId = $user->id;
                $model_details->profileLevelId = $request->profileLevel;
                $model_details->countryId = $request->country;
                $model_details->age = $request->age;
                $model_details->height = $request->height;
                $model_details->weight = $request->weight;
                $model_details->hair = $request->hair;
                $model_details->eyecolor = $request->eyecolor;
                $model_details->waist = $request->waist;
                $model_details->hips = $request->hips;
                $model_details->bust = $request->bust;
                $model_details->comments = $request->comments?$request->comments:null;
                $model_details->isAccepted = 1;
                $model_details->status = 1;

                if(!$model_details->save()){
                    return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                }

                if(isset($request->category)){
                    foreach ($request->category as $key => $value) {
                        $model_category = new ModelCategory;
                        $model_category->userId = $user->id;
                        $model_category->categoryId = $value;
                        if(!$model_category->save()){
                            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                        }
                    }
                }

                // add model language 
                if(isset($request->language)){
                    foreach ($request->language as $key => $value) {
                        $model_language = new ModelLanguage;
                        $model_language->userId = $user->id;
                        $model_language->languageId = $value;
                        if(!$model_language->save()){
                            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                        }
                    }
                }
               
                // add model image 
                if(@$request->modelImage){

                    foreach ($request->modelImage as $multiple_image){
                       
                        $image = $multiple_image;
                        $name = $image->getClientOriginalName();
                        $nameWithoutExtension = explode('.', $name)[0];
                        $extension = explode('.', $name)[1];

                        $imageName = $nameWithoutExtension.'_'.$modelSlug.'.'.$extension;
                    
                        if($request->removeValue){

                            if(!in_array($name ,$request->removeValue)){                                
                                $model_image = new ModelImage;
                                $model_image->userId = $user->id;
                                $image->storeAs('public/adminAssets/uploads/models', $imageName);
                                $model_image->image = $imageName;
                                
                                if(!$model_image->save()){
                                    return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                                }                         
                            }
                        } 
                        
                        if(!$request->removeValue){
                            $model_image = new ModelImage;
                            $model_image->userId = $user->id;
                            $image->storeAs('public/adminAssets/uploads/models', $imageName);
                            $model_image->image = $imageName;
                            if(!$model_image->save()){
                                return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                            }        
                        }                            
                        
                    }
                }

                if(isset($request->visa)){
                    foreach ($request->visa as $key => $value) {
                        $visa = new ModelVisa;
                        $visa->userId = $user->id;
                        $visa->countryName = $value;
                        $visa->expiryDate = $request->visa_date[$key];
                        if(!$visa->save()){
                            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                        }
                    }
                }
                return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Model Added Successfully.', 'ResponseData' => $user ], 200);
            }else{
                return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
            }
        }catch (JWTException $e) {
            return response()->json(['ResponseCode'=>0,'ResponseText'=>'Something went wrong.'], 500);
        }

    }

    // Edit  Models 
    public function edit(Request $request){

        $users = User::where('id',$request->id)
                ->whereHas('roles', function($q){
                $q->where('name', 'model');
                })->where('status','1')->first();
        $model_details= ModelDetails::where('userId',$request->id)->first();       
        $model_category= ModelCategory::where('userId',$request->id)->get();       
        $modelLanguage= ModelLanguage::where('userId',$request->id)->get();       
        $profileLevelList = ProfileLevel::all();
        $categoryList = Category::all();
        $countryList = Country::all();
        $languageList = Language::all();
        $model_visa = ModelVisa::where('userId',$request->id)->get();
        $ModelImage = ModelImage::where('userId',$request->id)->get();
        $view = View::make('admin.model.edit_model',compact('users','model_details','profileLevelList','categoryList','countryList','languageList','model_category','model_visa','ModelImage','modelLanguage'));
        $view = $view->render();

        return response()->json(['ResponseCode' => 1, 'ResponseText' => 'Model Deleted Successfully.','html' => $view],200);
    }

    // Update Models
    public function update(Request $request){
    
        try{

            $modelSlug = str_slug($request->fullName,"");

            $user = new User;
            $user->exists = true;
            $user->id = $request->userId;
            $user->fullName = $request->fullName;
            $user->email  = $request->email;
            $user->phone = $request->mobile;            
            $user->country = $request->country;
            $user->city = $request->city;
            $user->slug = $modelSlug;
            $user->assignRole(Role::where('name','model')->first());
            // $user->update();
            if($user->save()){

                $model_details = ModelDetails::where('userId',$request->userId)->first();
                $model_details->userId = $request->userId;
                $model_details->profileLevelId = $request->profileLevel;
                $model_details->height = $request->height;
                $model_details->weight = $request->weight;
                $model_details->hair = $request->hair;
                $model_details->eyecolor = $request->eyecolor;
                $model_details->waist = $request->waist;
                $model_details->hips = $request->hips;
                $model_details->bust = $request->bust;
                $model_details->comments = $request->comments?$request->comments:null;
                // $model_details->update();
                if(!$model_details->update()){
                    return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                }

                // update model image 
                // delete Preview Image 
                if($request->removeValue){
                    foreach($request->removeValue as $removeImage){
                        $image = ModelImage::where('userId',$request->userId)
                                ->where('image',$removeImage)
                                ->delete();
                        $file = $removeImage;
                        $storagePath = env('ADMIN_ASSETS_URL') . '/uploads/models/';
                        $deleteImage = $storagePath.$file;
                        unlink($deleteImage);
                        
                    }
                }
                if(@$request->e_modelImage){

                    $model_images = ModelImage::where('userId',$request->userId)->get();
                   
                    foreach ($model_images as $key => $image) {

                        $file = $image->image;
                        $storagePath = env('ADMIN_ASSETS_URL') . '/uploads/models';
                        $deleteImage = $storagePath.$file;
                        
                        if(file_exists($deleteImage)) {    
    
                            if(unlink($deleteImage)){
                                return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Image Removed Successfully.'], 200);
                            }else{
                                return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                            }
                        }    
                    }


                    // $files = $request->file('modelImage');
                    foreach ($request->e_modelImage as $multiple_image) {
        
                        $image = $multiple_image;
                        $name = $image->getClientOriginalName();
                        $nameWithoutExtension = explode('.', $name)[0];
                        $extension = explode('.', $name)[1];

                        $imageName = $nameWithoutExtension.'_'.$modelSlug.'.'.$extension;

                        if($request->removeValue){
                            if(!in_array($name ,$request->removeValue)){     
                                $model_image = new ModelImage;
                                $model_image->userId = $request->userId;
                                $image->storeAs('public/adminAssets/uploads/models', $imageName);
                                $model_image->image = $imageName;
                                $model_image->save();
                            }
                        } 
                        
                        if(!$request->removeValue){
                            $model_image = new ModelImage;
                            $model_image->userId = $request->userId;
                            $image->storeAs('public/adminAssets/uploads/models', $imageName);
                            $model_image->image = $imageName;
                            $model_image->save();
                        }  

                       
                    }
                }

                if(isset($request->category)){
                    $category = ModelCategory::where('userId',$request->userId)->delete();
                    foreach ($request->category as $key => $value) {
                        $model_category = new ModelCategory;
                        $model_category->userId = $request->userId;
                        $model_category->categoryId = $value;
                        if(!$model_category->save()){
                            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                        }
                    }
                }

                // update model language 
                if(isset($request->language)){
                    $model_language = ModelLanguage::where('userId',$request->userId)->delete();
                    foreach ($request->language as $key => $value) {
                        $language = new ModelLanguage;
                        $language->userId = $request->userId;
                        $language->languageId = $value;
                        if(!$language->save()){
                            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                        }
                    }
                }

                if(isset($request->visa)){
                    $model_visa = ModelVisa::where('userId',$request->userId)->delete();
                    foreach ($request->visa as $key => $value) {
                        $visa = new ModelVisa;
                        $visa->userId = $request->userId;
                        $visa->countryName = $value;
                        $visa->expiryDate = $request->visa_date[$key];
                        
                        if(!$visa->save()){
                            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
                        }
                    }
                }

                return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Model Update Successfully.', 'ResponseData' => $user ], 200);

            }else{
                return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);

            }
                
        }catch (JWTException $e) {
            return response()->json(['ResponseCode'=>0,'ResponseText'=>'Something went wrong.'], 500);
        }

    }

    public function destroy(Request $request){

        $user = User::where('id',$request->id)->delete();

        if($user){          
                return response()->json([ 'ResponseCode' => 1, 'ResponseText' => 'Model Deleted Successfully.' ], 200);                     
        }else{  
            return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
        }

    }

    public function changeStatus(Request $request)
    {
        $user = ModelDetails::where('userId',$request->id)->first();
        // dd($user);
        $user->isAccepted = $request->status;
        $user->update();
        
       
    }
    
}
