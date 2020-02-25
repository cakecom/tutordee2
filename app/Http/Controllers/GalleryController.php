<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userID=Auth::id();
        $gallery=Gallery::where('user_id',$userID)->get();
        return view('pages.user.gallery.index',compact('gallery'));
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
        $id=Auth::id();
        $file = $request->file('file');
        $path = 'images/uploads/'.$id;
        $filename = $file->getClientOriginalName();
        $file->move($path, $filename);
        $user = Auth::user();
        $Gallery = new Gallery([
            'image' => $filename

        ]);
        $user->gallery()->save($Gallery);
        $returnMessages = ["status" => "success", "messages" => "ทำรายการสำเร็จ!!"];
        return redirect('gallery')->with($returnMessages);
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
        //
        Gallery::where('status', 1)->update(['status' => 0]);
        Gallery::where('id', $id)->update(['status' => 1]);
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
        //
        $galerry=Gallery::find($id);
        $galerry->delete();
        return back();
    }
}
