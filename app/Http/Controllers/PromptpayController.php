<?php

namespace App\Http\Controllers;

use App\Models\TranRequest;
use Illuminate\Http\Request;

class PromptpayController extends Controller
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
        return view('pages.user.wallet.promptpayCreate');
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
        if($request->wallet_type==2){
            $file = $request->file('file');
            $path = 'images/uploads';
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
//        $activities = new Activities([
//            'document' => $filename,
//            'activities' => $request->activities,
//            'class_level' => $request->class_level,
//            'count' => $request->count,
//            'note' => $request->note,
//            'group'=> $request->group
//        ]);
            //
            $user = Auth::user();
            $tranRequest = new TranRequest([
                'amount' => $request->amount.'00',
                'image' => $filename

            ]);
            $user->tranRequest()->save($tranRequest);
        }
        return redirect('wallet')->with($returnMessages);
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
