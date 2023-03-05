<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Notifications\mailNotification;
use Illuminate\Support\Facades\Notification;

class adminController extends Controller
{

    //Doctor
    public function adddoctor()
    {
        return view('admin.add_doctor');
    }
    public function createdoctor(Request $request)

{
    $input = $request->all();

    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'speciality' => 'required',
        'room' => 'required',
        'image' => 'required',

    ]);
    if(request()->hasFile('image'))
    {

        $extension =request('image')->extension();
        $file ='user_pic'. time().'.'.$extension;
        request('image') ->storeAs('image',$file);
        $input['image'] =$file;

    }
   Doctor::create($input);

     return view('admin.home')->with('message',"user added succesfully!!");

}
public function showdoctor()
{
    $doctor= Doctor::all();
    return view('admin.showdoctor',compact('doctor'));
}

public function editdoctor($id)
{
    $doctor= Doctor::findOrFail(decrypt($id));
    return view('admin.editdoctor',compact('doctor'));

}

public function updatedoctor(Request $request, $id)
{
    $doctor= Doctor::findOrFail(decrypt($id));

    $input = $request->all();

    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'speciality' => 'required',
        'room' => 'required',

    ]);
    if(request()->hasFile('image'))
    {

        $extension =request('image')->extension();
        $file ='user_pic'. time().'.'.$extension;
        request('image') ->storeAs('image',$file);
        $input['image'] =$file;

    }

   $doctor-> update($input);


   return redirect()->route('showdoctor')->with('message',"user updated succesfully!!");

}

public function deletedoctor($id)
{
    $doctor= Doctor::findOrFail(decrypt($id));
    $doctor->delete();
    return redirect()->back();
}
//appointments

public function showappointment()
{
  $appointment= Appointment::all();

    return view('admin.showappointment',compact('appointment'));
}

public function approvedappointment($id)
{
    $appointment= Appointment::findOrFail(decrypt($id));
    $appointment['status'] ='approved';

    $appointment-> update();
    return redirect()->back();
}

public function cancelappointment($id)
{
    $appointment= Appointment::findOrFail(decrypt($id));
     $appointment['status'] ='cancelled';
    $appointment-> update();

    return redirect()->back();
}
public function emailview($id)
{
    $appointment= Appointment::findOrFail(decrypt($id));

    return view('admin.emailview',compact('appointment'));
}

public function sendemail(Request $request, $id)
{
    $data= Appointment::findOrFail(decrypt($id));

$details=[
    'greeting'=>$request->greeting,
    'body'=>$request->body,
    'actiontext'=>$request->actiontext,
    'actionurl'=>$request->actionurl,
    'endpart'=>$request->endpart
];
Notification::send($data,new mailNotification($details));

return redirect()->route('showappointment')->with('message',"Notification sent succesfully!!");


}
}

