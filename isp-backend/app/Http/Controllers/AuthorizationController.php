<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorizationController extends Controller
{

    public function managerLogin(Request $request){
        $request->validate([
            'manager_email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->only('manager_email', 'password');

        if(Auth::attempt($credentials)){
            return response()->json(Auth::user(), 200);
        }

        throw new ValidationException("credentials are incorrect");
    }

    public function advisorLogin(Request $request){
        $request->validate([
            'advisor_email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->only('advisor_email', 'password');

        if(Auth::guard('advisor')->attempt($credentials)){
            return response()->json(Auth::user(), 200);
        }

        throw new ValidationException("credentials are incorrect");
    }

    public function logout()
    {
        Auth::logout();
    }

    public function studentRegister(Request $request){
        $request->validate([
            'student_name' => ['required'],
            'student_surname' => ['required'],
            'student_email' => ['required','email','unique:students'],
            'student_password' => ['required','min:8'],
            'student_iin' => ['required','min:12'],
            'student_phone_num' => ['required'],
        ]);

        $student = new Student();

        $student->student_name = $request->student_name;
        $student->student_surname = $request->student_surname;
        $student->student_patronymic = $request->student_patronymic;
        $student->student_email = $request->student_email;
        $student->student_password = Hash::make($request->student_password);
        $student->student_iin = $request->student_iin;
        $student->student_phone_num =  $request->student_phone_num;
        $student->student_total_gpa =  $request->student_total_gpa;
        $student->group_id =  $request->group_id;

        $student->save();

    }
}
