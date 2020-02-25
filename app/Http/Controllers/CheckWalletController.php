<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use App\Models\TranRequest;
use Illuminate\Http\Request;

class CheckWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $checkwallet = TranRequest::all();
//        dd($checkWallet);

        return view('pages.admin.check-wallet',compact('checkwallet'));
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
        //
//        dd($request);
        $tranRequest=new TranRequest;

        if($request->status==1){
            $user =User::find($request->user_id);
            $user->deposit($request->amount);
            $data=[
                'status' =>$request->status
            ];
        }
//        $user =Auth::user();
//        $user->withdraw(10);
//        echo "update";
        $tranRequest->findOrFail($id)->update($data);
        return redirect('checkwallet');
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
