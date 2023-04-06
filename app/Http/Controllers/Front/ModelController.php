<?php

namespace App\Http\Controllers\Front;

use Hash;
use View;
use PDF;
use App\Models\User;
use App\Models\Role;
use App\Models\Event;
use App\Models\Country;
use App\Models\Language;
use App\Models\Category;
use App\Models\ModelVisa;
use App\Models\ModelDetails;
use App\Models\ModelCategory;
use App\Models\ProfileLevel;
use App\Models\ModelImage;
use App\Models\ModelLanguage;
use Illuminate\Http\Request;
use App\Models\ModelEventCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Exceptions\JWTException;


class ModelController extends Controller
{
    public function index(){
        $profileLevelList = ProfileLevel::all();
        $categoryList = Category::all();
        $countryList = Country::all();
        $languageList = Language::all();
        return view('front.model.index',compact('profileLevelList','categoryList','countryList','languageList'));
    }

    public function store(Request $request){
       
        try{
            
            $modelSlug = str_slug($request->fullName,"");

            $user = new User;
            $user->fullName = $request->fullName;
            $user->email  = $request->email;
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
                $model_details->age = $request->age;
                $model_details->height = $request->height;
                $model_details->weight = $request->weight;
                $model_details->hair = $request->hair;
                $model_details->eyecolor = $request->eyecolor;
                $model_details->waist = $request->waist;
                $model_details->hips = $request->hips;
                $model_details->bust = $request->bust;
                $model_details->comments = $request->comments?$request->comments:null;
                $model_details->isAccepted = 0;
                $model_details->status = 1;

                if(!$model_details->save()){
                    return response()->json([ 'ResponseCode' => 0, 'ResponseText' => 'Something Went Wrong.'], 500);
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

    public function userEvent(Request $request)
    {
        // dd($request->eventId);
        $events = ModelEventCategory::where('eventId',$request->eventId)->where('userId',$request->modelId)->first();
        if(@$events){
            return response()->json(['ResponseCode'=>0,"ResponseText"=>"This Model Already Added in this event"],200);
        }else{
            $eventData = Event::find($request->eventId);
            $eventData->noOfGirls = $eventData->noOfGirls + 1 ;
            $eventData->update();
            $modelEventCategory = new ModelEventCategory;
            $modelEventCategory->eventId = $request->eventId;
            $modelEventCategory->categoryId = $request->categoryId;
            $modelEventCategory->userId = $request->modelId;
            if($modelEventCategory->save()){
                return response()->json(['ResponseCode'=>1,"ResponseText"=>"Model Added Succefully"],200);
            }else{
                return response()->json(['ResponseCode'=>0,"ResponseText"=>"Somthing went wrong."],200);
            }
        }

    }
    public function pdfDownload()
    {
      $pdf = PDF::loadView('front.model.contract-pdf');
      // download PDF file with download method
      $fileName =  time().'.'. 'pdf' ;
        $pdf->save(public_path() . '/' . $fileName);

        $pdf = public_path($fileName);
        return response()->download($pdf);
    }
}
