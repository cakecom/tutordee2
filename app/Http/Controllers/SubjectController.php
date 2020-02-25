<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Group=Group::all();
        $Subject=Subject::all();

        return view('pages.admin.subject.subject',compact('Subject','Group'));
        //
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
        $group=Group::findOrFail($request->groupID);
        $subject=new Subject(['subject_name'=>$request->subjectName]);
        $group->subject()->save($subject);
        return redirect('subject');
//        $subject = new Subject();
//        $subject->subject_name = request('subjectName');
//        $subject->save();
//        return redirect('subject');
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
        $Subject=Subject::findOrFail($request->subjectID);
        $Subject->subject_name=request('subjectName');
        $Subject->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Subject=Subject::find($id);
        $Subject->delete();
        return redirect('subject');
    }
}
