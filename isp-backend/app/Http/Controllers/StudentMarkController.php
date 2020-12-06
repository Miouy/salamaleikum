<?php

namespace App\Http\Controllers;

use App\Models\StudentMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentMarkController extends Controller
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
        $studentMarks = StudentMark::all();

        return response()->json($studentMarks, 200);
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
        $studentMarks = new StudentMark();
        $studentMarks->setAttribute('mt_1', $request->mt_1);
        $studentMarks->setAttribute('mt_2', $request->mt_2);
        $studentMarks->setAttribute('exam', $request->exam);
        $studentMarks->setAttribute('final', $request->final);
        $studentMarks->setAttribute('grade_name	', $request->grade_name	);
        $studentMarks->setAttribute('gpa	', $request->gpa	);
        $studentMarks->setAttribute('student_id	', $request->student_id	);
        $studentMarks->setAttribute('discipline_id	', $request->discipline_id	);
        $studentMarks->save();
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
        $studentMark = DB::table('student_marks')->where('student_mark_id', $id)->first();

        return response()->json($studentMark, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $studentMarks = StudentMark::find($id);
        $studentMarks->setAttribute('mt_1', $request->mt_1);
        $studentMarks->setAttribute('mt_2', $request->mt_2);
        $studentMarks->setAttribute('exam', $request->exam);
        $studentMarks->setAttribute('final', $request->final);
        $studentMarks->setAttribute('grade_name	', $request->grade_name	);
        $studentMarks->setAttribute('gpa	', $request->gpa	);
        $studentMarks->setAttribute('student_id	', $request->student_id	);
        $studentMarks->setAttribute('discipline_id	', $request->discipline_id	);
        $studentMarks->save();
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
        DB::table('student_marks')->delete($id);
    }
}
