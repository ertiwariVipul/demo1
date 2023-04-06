<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Country;
use App\Models\Language;
use App\Models\Category;
use App\Models\ModelVisa;
use App\Models\ModelImage;
use App\Models\ModelDetails;
use App\Models\ModelCategory;
use App\Models\ModelLanguage;
use App\Models\ProfileLevel;
use App\Models\ModelEventCategory;

class HomeController extends Controller
{
    // Front Home 
    public function index(){

        $model = User::whereHas('roles', function($q){
            $q->where('name', 'model');
            })->get()->map(function($data){
            $data->modelImage = ModelImage::where('userId',$data->id)->get();
            return $data;
        });
        $category = Category::all();
        return view('front.home',compact('category','model'));
    }

    // public function atmosphereGirls(){
    //     $profileLevelList = ProfileLevel::all();
    //     $countryList = Country::all();
    //     $models = User::role('model')->with('model_details')->with('model_images')->with('model_images')->get();
    //     return view('front.atmosphereGirls.atmosphere-girls',compact('profileLevelList','countryList','models'));
    // }

    public function login(){
        return view('front.auth.login');
    }

    public function register(){
        return view('front.auth.register');
    }

    public function contact(){
        return view('front.contact.index');
    }

    public function modelList(){
        return view('front.model.index');
    }

    public function modelProfile($id){
     
        $models = User::where('id',$id)->whereHas('roles', function($q){
            $q->where('name', 'model');
            })->with('model_details')->first();
        $event = Event::where('status',0)->get();
        $profileLevelList = ProfileLevel::all();
        $model_category= ModelCategory::where('userId',$id)->with('model_service')->get();      
        $modelLanguage= ModelLanguage::where('userId',$id)->with('model_language')->get();
        $model_visas = ModelVisa::where('userId',$id)->get();
        $ModelImage = ModelImage::where('userId',$id)->get();
        $modelDetails = ModelDetails::where('userId',$id)->first();
        $modelProfile = ModelDetails::where('profileLevelId',$modelDetails->profileLevelId)
        ->with('user')
        ->get();

        $events = Event::with(['eventCategories','eventCategories'])->where('id',$id)->first();
        return view('front.model.profile',compact('models','model_category','modelLanguage','profileLevelList','model_visas','ModelImage','modelProfile','event'));
    }
    
    public function rates(){
        return view('front.rates.index');
    }
}
