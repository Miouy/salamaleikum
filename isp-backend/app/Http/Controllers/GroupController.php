<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        //
        $groups = Group::all();

        return response()->json($groups, 200);
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
        $group = new Group();
        $group->setAttribute('group_name', $request->group_name);
        $group->setAttribute('advisor_id', $request->advisor_id);
        $group->setAttribute('course_id', $request->course_id);
        $group->save();

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
        $group = DB::table('groups')->where('group_id', $id)->first();

        return response()->json($group, 200);
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
        $group = Group::find($id);
        $group->setAttribute('group_name', $request->group_name);
        $group->setAttribute('advisor_id', $request->advisor_id);
        $group->setAttribute('course_id', $request->course_id);
        $group->save();

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
        DB::table('groups')->delete($id);
    }
}
