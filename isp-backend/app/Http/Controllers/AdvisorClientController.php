<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum','advisor']);
    }

    //
    public function getAdvisorGroups(Request $request){
        $advisor = $request->user();

        $groups = DB::table('groups')->where('advisor_id', $advisor->advisor_id);

        return response()->json($groups, 200);
    }

    public function getAdvisorGroupStudents(Request $request, int $id){
        $students = DB::table('students')->where('group_id', $id);

        return response()->json($students, 200);
    }

    public function getStudentDisciplines(Request $request, int $id){
        $student_marks = DB::table('student_marks')->where('student_id', $id);
        $disciplines = array();
        foreach ($student_marks as $student_mark){
            array_push($disciplines, $student_mark->discipline);
        }

        return response()->json($student_marks, 200);
    }
//
    public function getStudentRequests(Request $request, int $id){
        $student_requests = DB::table('student_requests')->where('student_id', $id);

        $discipline_requests = array();
        foreach ($student_requests as $student_request){
            array_push($discipline_requests, $student_request->disciplineRequests);
        }

        return response()->json(['student_requests' => $student_requests, 'discipline_requests' => $discipline_requests], 200);
    }

    private function addRequestedDisciplines(int $id){
        $student_request = DB::table('student_requests')->where('student_id', $id)->where('action', $value = "ADD")->first();

        $discipline_requests = $student_request->disciplineRequests;
        foreach ($discipline_requests as $discipline_request) {
            $student_mark = new StudentMark();
            $student_mark->mt_1 = 0.0;
            $student_mark->mt_2 = 0.0;
            $student_mark->exam = 0.0;
            $student_mark->final = 0.0;
            $student_mark->grade_name = "F";
            $student_mark->gpa = 0.0;
            $student_mark->student_id = $id;
            $student_mark->discipline_id = $discipline_request->discipline_id;
            $student_mark->save();
        }
    }

    private function deleteRequestedDisciplines(int $id){
        $student_request = DB::table('student_requests')->where('student_id', $id)->where('action', $value = "DELETE")->first();

        $discipline_requests = $student_request->disciplineRequests;
        foreach ($discipline_requests as $discipline_request) {
            $student_mark = DB::table('student_marks')->where('student_id', $id)->where('discipline_id', $discipline_request->discipline_id)->first();
            DB::table('student_marks')->delete($student_mark->student_mark_id);
        }
    }

    public function confirmStudentRequests(Request $request, int $id){
        $student = Student::find($id);
        if($student){
            $this->addRequestedDisciplines($id);
            $this->deleteRequestedDisciplines($id);
        }
        return response()->json($request, 200);
    }

    public function rejectStudentRequests(Request $request, int $id){
        $student_request = DB::table('student_requests')->where('student_id', $id)->first();

        DB::table('student_requests')->delete($student_request->student_request_id);

        return response()->json($request, 201);
    }
}
