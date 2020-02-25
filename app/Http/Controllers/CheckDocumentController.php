<?php

namespace App\Http\Controllers;

use App\Models\doc_request;
use App\Models\User;
use App\Models\TranRequest;
use Illuminate\Http\Request;

class CheckDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkdoc = doc_request::all();
//        dd($checkWallet);

        return view('pages.admin.check-doc',compact('checkdoc'));
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
        $docRequest=new doc_request();

        if($request->status==1){
            $user =User::find($request->user_id);
            $data=[
                'status' =>$request->status
            ];
        }
//        $user =Auth::user();
//        $user->withdraw(10);
//        echo "update";
        $docRequest->findOrFail($id)->update($data);
        return redirect('check-doc');
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
