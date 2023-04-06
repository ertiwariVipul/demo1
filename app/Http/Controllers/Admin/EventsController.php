<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Exception;
use App\Models\Event;
use App\Models\Category;
use App\Models\ModelImage;
use App\Models\EventModel;
use Illuminate\Http\Request;
use Illuminate\Http\Schedule;
use App\Models\ModelDetails;
use App\Models\ModelCategory;
use App\Models\ModelEventCategory;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index(){

        $event = Event::orderBy('updated_at','DESC')->paginate(10);
        $modelDetails = ModelDetails::get();
        $category = Category::orderBy('name','ASC')->where('status','1')->get();
        $modelEventCategory = ModelEventCategory::get();
        return  view('admin.event.index',compact('event','category','modelEventCategory'));
    }

    public function eventDetails(Request $request,$id){        
        $eventDetails = Event::with(['eventCategories'=>function($query){
            $query->with(['category','users']);
            $query->groupBy('categoryId');
        }])->where('id',$id)->first();

        $allModelsEvent = ModelEventCategory::with(['users','model_details'])->where('eventId',$id)->get();
        return  view('admin.event.event-details',compact('eventDetails','allModelsEvent'));
    }

    // get data for model event category 
    public function modelEventCategory(Request $request){
        
        $modelEventCategory = ModelEventCategory::where('categoryId',$request->id)->where('eventId',$request->eventId)->with('users')->get();        
        return view('admin.event.categoryModelDetails',compact('modelEventCategory'));
    }

    // store events 
    public function store(Request $request){

        //$models = explode(",", $request->modelIds);
        try {
            $event = new Event;
            if($request->eventId){
                $event->exists = true;
                $event->id = $request->eventId;
            }
            $event->name = $request->name;
            $event->typeOfEvent = $request->typeOfEvent;
            $event->date = $request->date;
            $event->startTime = $request->startTime;
            $event->endTime = $request->endTime;
            $event->location = $request->location;
            $event->description = $request->description;
            $event->noOfGirls = $request->noOfGirls;
            $event->ageRange = $request->ageRange;
            $event->status = 1;
            $event->save();

            if($request->eventId){
                ModelEventCategory::where('eventId',$request->eventId)->delete();
            }
            
            $models = explode(",", $request->modelIds);
           
            foreach ($models as $key => $value) {
                $modelCategory = ModelCategory::where('userId',$value)->pluck('categoryId')->toArray();
                
                foreach ($request->category as $key => $categoryId) {
                    if(in_array($categoryId,$modelCategory)){
                        $modelEventCategory = new ModelEventCategory;
                        $modelEventCategory->eventId = $event->id;
                        $modelEventCategory->categoryId = $categoryId;
                        $modelEventCategory->userId = $value;
                        $modelEventCategory->save();
                        break;
                    }
                }
            }

            $message ='Event Created Successfully';
            if($request->eventId){
                $message ='Event Updated Successfully';
            }
            return response()->json([ 'ResponseCode' => 1, 'ResponseText' => $message, 'ResponseData' => '' ], 200);

        }catch (Exception $e) {
            return response()->json(['ResponseCode'=>0,'ResponseText'=>'Something went wrong.'], 500);
        }

    }
    
    public function list(Request $request){
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = (int)$request->get('length');
        $page = ($request->start / $length) + 1;
        $search = $request->search['value'];
        
      
        if (isset($request->order)) {
            $order = $request->order[0]['dir'];
            $columns = $request->order[0]['column'];
            $name_field = $request->columns[$columns]['data'];
        }

        $members = new Event;

        if ($search != "") {
            $members = $members->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('typeOfEvent', 'like', '%' . $search . '%')
                    ->orWhere('startTime', 'like', '%' . $search . '%')
                    ->orWhere('date', 'like', '%' . $search . '%')
                    ->orWhere('endTime', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%')
                    ->orWhere('noOfGirls', 'like', '%' . $search . '%')
                    ->orWhere('ageRange', 'like', '%' . $search . '%');
            });
        }
        
        if (!isset($request->order)) {
            $members = $members->orderby('updated_at', 'DESC');
        } else {

            $name_field = $request->columns[$columns]['data'];
            if ($name_field == 'date') {
                $name_field = 'created_at';
            }
            $members = $members->orderby($name_field, $order);
        }

        $members = $members->paginate($length, ['*'], 'page', $page);

        foreach ($members as $key => $value) {
            $value->eventIndex = $key+1;
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
    
    // chnage status 
    // public function changeStatus(Request $request){
      
    //     $status = new Event;
    //     $status->exists = true;
    //     $status->id = $request->id;
    //     $status->status = $request->status;
    //     if($status->save()){
    //         return response()->json([
    //             'success' => 'You changed status successfully.',
    //         ]);
    //     }else{
    //         return response()->json([
    //             'error' => 'Something Went Wrong.',
    //         ]);
    //     }
    // }

    public function destroy(Request $request,$id){
        $event = Event::where('id',$id)->delete();
        if($event){
            return response()->json([ 'success' => 'Event Delete Successfully'], 200);
        }else{
            return response()->json([ 'error' => 'Somthing went wrong.'], 500);
        }
    }

    public function modelByCategory(Request $request){
        $data =  ModelDetails::with('user');
        if($request->CountryId != ''){
            $data->where('countryId',$request->categoryId);
        }
        if($request->value1 != '' && $request->value2 != ''){
            $data->whereBetween('age', [$request->value1, $request->value2]);
        }
        return $data->get();
    }

    public function edit(Request $request,$id){
        try {
            $event = Event::with(['eventCategories','eventCategories'])->where('id',$id)->first();
            $userIds = $event->eventCategories->pluck('userId')->toArray();
            $categoryIds = $event->eventCategories->pluck('categoryId')->toArray();
            $category = Category::orderBy('name','ASC')->where('status','1')->get();
            // {{ route('modelProfile',['id'=> @$modelItem['users']['id]]) }}
            $modelList = ModelEventCategory::with(['users'])->whereIn('categoryId',$categoryIds)->where('eventId',$id)->get();
            $modelEventCategory = ModelEventCategory::where('eventId',$event->id)->get();
            
            return view('admin.event.create',compact('event','modelList','category','userIds','modelEventCategory'));
        }catch (Exception $e) {
            return response()->json(['status'=>0,'data'=>null,'message'=>'Something went wrong.','error'=>$e], 500);
        }
    }

    public function changeStatus(Request $request)
    {
        $evant = Event::where('id',$request->id)->first();
        // dd($evant);
        if($evant->status == "1" && $request->status == "2"){
            return response()->json(['ResponseCode'=>0,'ResponseText'=>"Now You can not reject this event"],200);
        }else if($evant->status == "2" && $request->status == "1"){
            return response()->json(['ResponseCode'=>0,'ResponseText'=>"Now You can not Approved this event"],200);
        }else{
            $evant->status = $request->status;
            $evant->update();
        }              
    }
}
