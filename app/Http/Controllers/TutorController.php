<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
//        dd($request);
        $rating=new Review();
        $rating->user_id =$request->input('user_id');
        $rating_value = $request->input('rating');
        $rating_value = number_format($rating_value,1);
        $rating->rating = $rating_value;
        $rating->comments = $request->input('comments');
        $rating->name = $request->input('name');
        // echo '<pre>';print_r($rating);exit;
        $rating->save();
        $success_message = 'Your review have been updated successfully';
        return back();
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
        $user=User::find($id);
        $rating=Review::where('user_id',$id)->first();
        $subject=Subject::find($user['subject_id']);
//        dd($rating);
//        dd($rating);
//        dd($user);
        return view('pages.guest.tutor-profile',compact('user','rating','subject'));
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
        //
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
    }
}
