<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum','manager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $student = new Student();
        $student->setAttribute('student_name', $request->student_name);
        $student->setAttribute('student_surname', $request->student_surname);
        $student->setAttribute('student_patronymic', $request->student_patronymic);
        $student->setAttribute('student_email', $request->student_email);
        $student->setAttribute('student_password', $request->student_password);
        $student->setAttribute('student_iin', $request->student_iin);
        $student->setAttribute('student_phone_num', $request->student_phone_num);
        $student->setAttribute('student_total_gpa', $request->student_total_gpa);
        $student->setAttribute('group_id', $request->group_id);
        $student->save();
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        //
        $student = DB::table('students')->where('student_id', $id)->first();

        return response()->json($student, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = Student::find($id);
        $student->setAttribute('student_name', $request->student_name);
        $student->setAttribute('student_surname', $request->student_surname);
        $student->setAttribute('student_patronymic', $request->student_patronymic);
        $student->setAttribute('student_email', $request->student_email);
        $student->setAttribute('student_password', $request->student_password);
        $student->setAttribute('student_iin', $request->student_iin);
        $student->setAttribute('student_phone_num', $request->student_phone_num);
        $student->setAttribute('student_total_gpa', $request->student_total_gpa);
        $student->setAttribute('group_id', $request->group_id);
        $student->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('students')->delete($id);
    }

    /*
     * $student_marks = Student::find(id)->student_marks;

        $disciplines =array();

        foreach ($student_marks as $mark){
            array_push($disciplines,$mark->discipline);
        }

        return response()->json($disciplines, 200);
    */
}
