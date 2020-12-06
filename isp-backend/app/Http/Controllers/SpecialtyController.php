<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum','manager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $specialties = Specialty::all();

        return response()->json($specialties, 200);
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
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        //
        $specialty = new Specialty();
        $specialty->setAttribute('name', $request->specialty_name);
        $specialty->setAttribute('code', $request->specialty_code);
        $specialty->setAttribute('courses_quantity', $request->specialty_courses_quantity);
        $specialty->save();
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
     * @param int $id
     * @return JsonResponse
     */
    public function edit(int $id)
    {
        //
        $specialty = DB::table('specialties')->where('specialty_id', $id)->first();

        return response()->json($specialty, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        //
        $specialty = Specialty::find($id);
        $specialty->setAttribute('name', $request->name);
        $specialty->setAttribute('code', $request->code);
        $specialty->setAttribute('courses_quantity', $request->courses_quantity);
        $specialty->save();
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
        DB::table('specialties')->delete($id);
    }
}
