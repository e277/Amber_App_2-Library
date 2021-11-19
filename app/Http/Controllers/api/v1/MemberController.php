<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Member::all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'publication_date' => 'required',
            'amount_owned' => 'required'
        ]);

        Member::create($request->all());
        return response()->json('data save', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return response()->json($member, Response::HTTP_OK);
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
        $request->validate([
            'member_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'publication_date' => 'required',
            'amount_owned' => 'required'
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->all());
        return response()->json($member, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function searchMember($name)
    {
        try {
            Member::select("*", DB::raw("CANCAT(users.fname, ' ', users.lname) as fullName"))->get();
            $search  = Member::where("fullName", "LIKE", "%".$name."%");
        } catch (\Throwable $th) {
            // throw $th;
            abort(Response::HTTP_NOT_FOUND, "MEMBER NOT FOUND");
        }
        return response()->json($search, Response::HTTP_OK);
    }
}
