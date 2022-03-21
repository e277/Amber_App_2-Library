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
            'fname' => 'required',
            'lname' => 'required',
            'join_date' => 'required',
            'address' => 'required',
            'phoneNo' => 'required',
            'email' => 'required'
        ]);

        Member::create($request->all());
        return response()->json('Member is saved successfully', Response::HTTP_OK);
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
            'fname' => 'required',
            'lname' => 'required',
            'join_date' => 'required',
            'address' => 'required',
            'phoneNo' => 'required',
            'email' => 'required'
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
        Member::destroy($id);
        
        return response()->json("Member has been deleted successfully", Response::HTTP_OK);
    }

    public function searchMember($name)
    {
    
        // $full_name = Member::select(["id", DB::raw("CANCAT('members.fname', ' ', 'members.lname') as 'full_name'")])->pluck('full_name');
        //                     // ->where("full_name", "LIKE", "%".$name."%")->get();
        //                     return $full_name;
        //                     dd($full_name);


        
        $search = "%{$name}%";
        $name = Member::select("[fname, lname]", DB::raw('CONCAT(members.fname, " ", members.lname) as full_name'))->get();
        $full_name = Member::where($name, 'like', $search)->get();

        return response()->json($full_name, Response::HTTP_OK);

    }
}
