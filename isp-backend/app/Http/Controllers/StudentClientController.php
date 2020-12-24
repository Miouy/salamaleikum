<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Http\Request;

class StudentClientController extends Controller
{
    public function getStudentDisciplines(int $id)
    {
        $student = Student::find($id);

        $stud_marks = StudentMark::where(['student_id','=',$student->student_id]);

        $disciplines_id=array();

        foreach ($stud_marks as $mark){
            $disciplines_id.array_push($mark->discipline_id);
        }

        $disciplines = Discipline::find($disciplines_id);

        return response()->json($disciplines,200);
    }

    public function getRetakesSum($id){
        $student = Student::find($id);

        $stud_marks = StudentMark::where(['final','<=','50'],['student_id','=',$student->student_id]);

        $course= $student->group->course;

        $disciplines_id=array();

        foreach ($stud_marks as $mark){
            $disciplines_id.array_push($mark->discipline_id);
        }

        $retakes = Discipline::find($disciplines_id);

        $retakes_sum=0;

        foreach ($retakes as $retake){
            $retakes_sum+=$retake->discipline_credit;
        }

        return response()->json($retakes_sum,200);

    }

    public function getMinMarksPass(int $id){
        $student = Student::find($id);

        $course= $student->group->course;

        $semester = Semester::where(['course_id','=',$course->course_id],['semester_finished','=',1]);

        $disciplines = Discipline::where(['semester_id','=',$semester->semester_id]);

        $stud_marks = StudentMark::where(['student_id','=',$student->student_id]);

        $stud_marks = $stud_marks->find($disciplines);

        $f=false;

        $mt_1=0;
        $mt_2=0;
        $need=0;
        $m = array();

        foreach ($stud_marks as $mark){
            if($mark->mt_1 >= 50){
                $mt_1=$mark->mt_1;
            }
            if($mark->mt_2 >=50){
                $mt_2=$mark->mt_2;
            }
            if($mt_1 !=0 && $mt_2!=0){
                $need=(50-($mt_1+$mt_1)/2*0.6)/0.4;
            }
            if($need<50){
                $need=50;
            }
            $m.array_push($need);
        }

        return response()->json($m,200);
    }

    public function getMinMarksScholarship(int $id){
        $student = Student::find($id);

        $course= $student->group->course;

        $semester = Semester::where(['course_id','=',$course->course_id],['semester_finished','=',1]);

        $disciplines = Discipline::where(['semester_id','=',$semester->semester_id]);

        $stud_marks = StudentMark::where(['student_id','=',$student->student_id]);

        $stud_marks = $stud_marks->find($disciplines);

        $f=false;

        $mt_1=0;
        $mt_2=0;
        $need=0;
        $m = array();

        foreach ($stud_marks as $mark){
            if($mark->mt_1 >= 50){
                $mt_1=$mark->mt_1;
            }
            if($mark->mt_2 >=50){
                $mt_2=$mark->mt_2;
            }
            if($mt_1 !=0 && $mt_2!=0){
                $need=(70-($mt_1+$mt_1)/2*0.6)/0.4;
            }
            if($need<50){
                $need=50;
            }
            $m.array_push($need);
        }

        return response()->json($m,200);
    }

    public function getMinMarksHScholarship(int $id){
        $student = Student::find($id);

        $course= $student->group->course;

        $semester = Semester::where(['course_id','=',$course->course_id],['semester_finished','=',1]);

        $disciplines = Discipline::where(['semester_id','=',$semester->semester_id]);

        $stud_marks = StudentMark::where(['student_id','=',$student->student_id]);

        $stud_marks = $stud_marks->find($disciplines);

        $f=false;

        $mt_1=0;
        $mt_2=0;
        $need=0;
        $m = array();

        foreach ($stud_marks as $mark){
            if($mark->mt_1 >= 50){
                $mt_1=$mark->mt_1;
            }
            if($mark->mt_2 >=50){
                $mt_2=$mark->mt_2;
            }
            if($mt_1 !=0 && $mt_2!=0){
                $need=(90-($mt_1+$mt_1)/2*0.6)/0.4;
            }
            if($need<50){
                $need=50;
            }
            $m.array_push($need);
        }

        return response()->json($m,200);
    }

}
