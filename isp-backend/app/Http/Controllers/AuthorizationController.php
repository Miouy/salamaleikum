<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Manager;
use App\Models\Student;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorizationController extends Controller
{

    public function managerLogin(Request $request){
        $request->validate([
            'manager_email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $manager = Manager::where('manager_email', $request->manager_email)->first();

        if(!$manager || !Hash::check($request->password, $manager->manager_password)) {
            throw new ValidationException("credentials are incorrect");
        }

        return $manager->createToken($request->manager_email)->plainTextToken;
    }

    public function advisorLogin(Request $request){
        $request->validate([
            'advisor_email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $advisor = Advisor::where('advisor_email', $request->advisor_email)->first();

        if(!$advisor || !Hash::check($request->password, $advisor->advisor_password)) {
            throw new ValidationException("credentials are incorrect");
        }

        return $advisor->createToken($request->advisor_email)->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }

    public function studentLogin(Request $request){
        $request->validate([
            'student_id' => ['required'],
            'password' => ['required']
        ]);

        $student = Student::where('student_id', $request->student_id)->first();

        if(!$student || !Hash::check($request->password, $student->student_password)) {
            throw new ValidationException("credentials are incorrect");
        }

        return $student->createToken($request->student_id)->plainTextToken;
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
