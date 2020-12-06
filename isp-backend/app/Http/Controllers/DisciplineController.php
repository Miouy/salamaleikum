<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discipline = Discipline::all();

        return response()->json($discipline,200);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $discipline = new Discipline();
        $discipline->setAttribute('discipline_name', $request->discipline_name);
        $discipline->setAttribute('discipline_credit', $request->discipline_credit);
        $discipline->setAttribute('discipline_code', $request->discipline_code);
        $discipline->setAttribute('discipline_semester', $request->discipline_semester);
        $discipline->setAttribute('discipline_type', $request->discipline_type);
        $discipline->setAttribute('discipline_teacher', $request->discipline_teacher);
        $discipline->setAttribute('discipline_is_elective', $request->discipline_is_elective);
        $discipline->setAttribute('course_id', $request->course_id);
        $discipline->save();
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $discipline = DB::table('disciplines')->where('discipline_id', $id)->first();

        return response()->json($discipline, 200);
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
        $discipline = Discipline::find($id);
        $discipline->setAttribute('discipline_name', $request->discipline_name);
        $discipline->setAttribute('discipline_credit', $request->discipline_credit);
        $discipline->setAttribute('discipline_code', $request->discipline_code);
        $discipline->setAttribute('discipline_semester', $request->discipline_semester);
        $discipline->setAttribute('discipline_type', $request->discipline_type);
        $discipline->setAttribute('discipline_teacher', $request->discipline_teacher);
        $discipline->setAttribute('discipline_is_elective', $request->discipline_is_elective);
        $discipline->setAttribute('course_id', $request->course_id);
        $discipline->save();
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
        DB::table('disciplines')->delete($id);
    }
}
