<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use DB;

class ApiController extends Controller
{
    
   public function display_form(){

   	  return view('crud/display_form');
   }

   public function form_submit(Request $request){

   	     $add = new Student;
         if($request->isMethod('post'))
           {
               $add->firstname = $request->get('firstname');
               $add->lastname = $request->get('lastname');
               $add->course = $request->get('course');
               /*$add->gender = $request->get('gender');

               if(!empty($request->file('image'))){
                $file=$request->file('image');
                $current=uniqid(Carbon::now()->format('YmdHs'));
                $file->getClientOriginalName();   
                $file->getClientOriginalExtension();        
                $fullfilename=$current.".".$file->getClientOriginalExtension();
                //print_R($fullfilename);
                $destinationPath = public_path('upload_image');
                $file->move($destinationPath,$fullfilename);
                $add->image=$fullfilename;
               }*/
               $add->address = $request->get('address');
               $add->save();
           }
           return response()->json([
            "message" => "student record created"
        ], 201);
   }

    public function display(){

        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    
    }

    public function display_data($id){

          //$edit_subject=Student::where('id',$id)->get();
          if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }
    }

     public function edit_form(Request $request ,$id='')
    {
         if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            /*$student->first_name = is_null($request->firstname) ? $student->first_name : $request->firstname;
            $student->last_name = is_null($request->lastname) ? $student->last_name : $request->lastname;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->address = is_null($request->address) ? $student->address : $request->address;*/
            

            $student->firstname=$request->get('firstname');
            $student->lastname=$request->get('lastname');
            $student->course=$request->get('course');
            $student->address=$request->get('address');

            $student->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
            
        }
       
    }

    public function delete_data($id)
    {
        if(Student::where('id', $id)->exists())
        {
            $student = Student::find($id);
            $student->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
        } 
        else{
            return response()->json([
              "message" => "Student not found"
            ], 404);
        }
    }

    public function search(Request $request){

      if($request->isMethod('post'))
         {
             $name = $request->get('name');
             $data = Student::where('first_name', 'LIKE', '%' . $name . '%')->paginate(5);
             return view('crud/display',compact('data'));

         }
    }
}