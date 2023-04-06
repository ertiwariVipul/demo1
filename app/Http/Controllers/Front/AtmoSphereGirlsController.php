<?php


namespace App\Http\Controllers\Front;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\ProfileLevel;
use App\Models\ModelCategory;
use App\Http\Controllers\Controller;
use App\Models\ModelDetails;

class AtmoSphereGirlsController extends Controller
{
    public function index(){
        $profileLevelList = ProfileLevel::all();
        $countryList = Country::all();
        $models = User::whereHas('roles', function($q){
            $q->where('name', 'model');
            })->where('status','1')->with('model_details','model_images')->get();

           
        return view('front.atmosphereGirls.atmosphere-girls',compact('profileLevelList','countryList','models'));
    }

// filter model 
    public function modelByCountry(Request $request){

        $data =  ModelDetails::with('user');
        if($request->CountryId != ''){
            $data->where('countryId',$request->CountryId);
        }
        if($request->categoryId != ''){
            $data->where('profileLevelId',$request->categoryId);
        }
        if($request->value1 != '' && $request->value2 != ''){
            $data->whereBetween('age', [$request->value1, $request->value2]);
        }
        return $data->get();
    }
    
}
