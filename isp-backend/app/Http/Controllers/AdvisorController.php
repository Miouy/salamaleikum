<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $advisors = Advisor::all();

        return response()->json($advisors, 200);
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
        $advisor = new Advisor();
        $advisor->setAttribute('advisor_name', $request->advisor_name);
        $advisor->setAttribute('advisor_surname', $request->advisor_surname);
        $advisor->setAttribute('advisor_email', $request->advisor_email);
        $advisor->setAttribute('advisor_password', $request->advisor_password);
        $advisor->setAttribute('advisor_phone_num', $request->advisor_phone_num);
        $advisor->save();

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
        $advisor = DB::table('advisors')->where('advisor_id', $id)->first();

        return response()->json($advisor, 200);
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
        //
        $advisor = Advisor::find($id);
        $advisor->setAttribute('advisor_name', $request->advisor_name);
        $advisor->setAttribute('advisor_surname', $request->advisor_surname);
        $advisor->setAttribute('advisor_email', $request->advisor_email);
        $advisor->setAttribute('advisor_password', $request->advisor_password);
        $advisor->setAttribute('advisor_phone_num', $request->advisor_phone_num);
        $advisor->save();

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
        DB::table('advisors')->delete($id);
    }
}
