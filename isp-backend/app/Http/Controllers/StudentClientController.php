<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentClientController extends Controller
{
    public function getStudentDisciplines(int $id,int $cc,int $sc)
    {
//        $disciplines = DB::table("disciplines")
//            ->join('student_marks','disciplines.discipline_id','=','student_marks.discipline_id')
//            ->where('student_marks.student_id',$id)->get();

//
        $disciplines = DB::table("disciplines")
            ->join('student_marks','disciplines.discipline_id','=','student_marks.discipline_id')
            ->where('student_marks.student_id',$id)
            ->join('semesters','disciplines.semester_id','=','semesters.semester_id')
            ->where('semesters.semester_num',$sc)
            ->join('courses','courses.course_id','=','semesters.course_id')
            ->where('courses.course_code',$cc)
            ->select('disciplines.*')
            ->get();

        $disciplines_id = array();

        foreach ($disciplines as $dis){
            $id=$dis->discipline_id;
            array_push($disciplines_id,$id);
        }

        $semester = DB::table("semesters")->where('semesters.semester_num',$sc)
            ->join('courses','courses.course_id','=','semesters.course_id')
            ->where('courses.course_code',$cc)
            ->get();

        $student_marks = DB::table("student_marks")->whereIn('student_marks.discipline_id',$disciplines_id)->get();
//
        return response()->json(['disciplines' => $disciplines,'student_marks'=>$student_marks,'semester'=>$semester],200);
        //return response()->json(['student_requests' => $student_requests, 'discipline_requests' => $discipline_requests], 200);
    }

    public function getCourseRetakes($id,$cc){
        $disciplines = DB::table("disciplines")
            ->join('student_marks','disciplines.discipline_id','=','student_marks.discipline_id')
            ->where('student_marks.student_id',$id)
            ->where('student_marks.final','<',50)
            ->join('semesters','disciplines.semester_id','=','semesters.semester_id')
            ->join('courses','courses.course_id','=','semesters.course_id')
            ->where('courses.course_code',$cc)
            ->select('disciplines.*')
            ->get();

        $sum=0;

        foreach ($disciplines as $dis){
            $sum+=$dis->discipline_credit*21500;
        }

        $disciplines_id = array();

        foreach ($disciplines as $dis){
            $id=$dis->discipline_id;
            array_push($disciplines_id,$id);
        }

        $student_marks = DB::table("student_marks")->whereIn('student_marks.discipline_id',$disciplines_id)->get();

        return response()->json(['disciplines' => $disciplines,'student_marks'=>$student_marks,'retake_sum'=>$sum],200);
    }


    public function getStudentSpecialty(int $id)
    {
        $specialty = DB::table("specialties")
            ->join('courses','specialties.specialty_id','=','courses.specialty_id')
            ->join('groups','groups.course_id','=','courses.course_id')
            ->join('students','groups.group_id','=','students.group_id')
            ->where('students.student_id',$id)
            ->get();


        return response()->json($specialty,200);
        //return response()->json(['student_requests' => $student_requests, 'discipline_requests' => $discipline_requests], 200);
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
