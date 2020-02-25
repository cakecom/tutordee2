<?php

namespace App\Http\Controllers;
use App\Models\TranRequest;
use App\Models\User;
use Auth;
use App\Models\Survey;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Survey::all();

        return  view('pages.user.customer.index',compact('data'));
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
        echo "THIS STORE";
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
        $users=new User;
        $id2 = Auth::user()->id;
        $data2=$users->findOrFail($id2);
        $data=Survey::findOrfail($id);
        return  view('pages.user.customer.show',compact('data','data2'));
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
        $users=new User;
        $id2 = Auth::user()->id;
        $user =Auth::user();
        $balance=$user->balance;
        if($balance==0){
            $returnMessages = ["status" => "danger", "messages" => "คุณมียอดเงินคงเหลือไม่เพียงพอโปรดเติมเงิน!!"];
                return  redirect('wallet')->with($returnMessages);
        }else {
//            dd($balance);
            $user->withdraw(30);
            $data = [
                'survey_regis' => $id
            ];
            $users->findOrFail($id2)->update($data);
            return redirect('customer/' . $id);
        }
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
