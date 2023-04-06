<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Auth;

class UserDashboardController extends Controller
{
    // dashboard view 
    public function index()
    {
        $event = Event::count();
        return view('user.dashboard.index',compact('event'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'userFullName'=>'required',
            'userEmail'=>'required',
            'userPhone'=>'required',
        ]);
        $user = User::find(Auth::user()->id);
        $user->firstName = $request->userFirstName;
        $user->middleName = $request->userMiddleName;
        $user->LastName = $request->userLastName;
        $user->fullName = $request->userFullName;
        $user->email = $request->userEmail;
        $user->phone = $request->userPhone;
        $user->city = $request->userCity;
        $user->country = $request->userCountry;
        if($request->image){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->storeAs('public/adminAssets/uploads/user',$name);
            $user->profile = $name;
        }
        if($user->update()){
            return redirect(route('user.index'));
        }

    }
}
