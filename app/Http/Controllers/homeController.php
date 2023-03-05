<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;



class homeController extends Controller
{
   public function index(){
    if(Auth::id())
    {
      return redirect('home');

    }
    else{
    $doctor= Doctor::all();
    return view('user.home',compact('doctor'));
    }
        }
    public function redirects()
    {
     if(Auth::id())
     {
      if(Auth::user()->usertype=='0')
      {
     $doctor= Doctor::all();

     return view('user.home',compact('doctor'));

      }
      else{
        return view('admin.home');
      }
    }
      else{
        return redirect()->back();
      }
}
public function createappointment(Request $request)
{
  $input = $request->all();

  $request->validate([
      'name' => 'required',
      'email' => 'required',
      'phone' => 'required',
      'doctor' => 'required',
      'date' => 'required',
      'message' => 'required',


  ]);
  $input['status'] ='in progress';
  if(Auth::id())
  {
    $input['user_id']=Auth::user()->id;

  }

 Appointment::create($input);
 return redirect()->back()->with('message',"Appointment fixed,We will contact u soon..");

}

public function myappointment(){
  if(Auth::id())
  {
    $user_id=Auth::user()->id;
    $appointment= Appointment::where('user_id',$user_id)->get();
  return view('user.my_appointment',compact('appointment'));
  }else{
    return redirect()->back();
  }
 }
public function deleteappointment($id)
{

  $appointment= Appointment::findOrFail(decrypt($id));
  $appointment->delete();
  return redirect()->back();
}

// }

}
