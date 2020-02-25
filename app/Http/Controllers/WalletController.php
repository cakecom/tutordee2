<?php

namespace App\Http\Controllers;
use App\Models\TranRequest;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //

        $user =Auth::user();
        $balance= $user->balance; // int(0)
        $tran=$user->transaction;
        $tranRequest=$user->tranRequest;

        return view('pages.user.wallet.index',compact('balance','tran','tranRequest'));

    }

    public function type_wallets()
    {
        //


        return view('pages.user.wallet.type-wallets');

    }
    public function pay_card(){
        return view('pages.user.wallet.pay-card');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($userId = Auth::user());
//        dd($request);
        if($request->wallet_type==1){
//            require_once  '../../vendor/autoload.php';
            define ( 'OMISE_PUBLIC_KEY' , 'pkey_test_5irkvg6mqwgdrfvgvzb' );
            define ( 'OMISE_SECRET_KEY' , 'skey_test_5irkvjq3kpnj6quaami' );
            define('OMISE_API_VERSION', '2019-05-29');
            $amount=$request->amount*100;


                $charge=\OmiseCharge::create(array(
                    'amount'=>$amount,
                    'currency'=>'thb',
                    'card'=>$request->omiseToken
                ));
//                dd($charge);
              if($charge['status']=='successful'){
                  $userId = Auth::user();
                  $userId->deposit($request->amount);
                  $returnMessages = ["status" => "success", "messages" => "ทำรายการสำเร็จ!!"];
              }else{
                  $returnMessages = ["status" => "danger", "messages" => "ทำรายการไม่สำเร็จ!!"];
              }
        }
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
                'amount' => $request->amount,
                'image' => $filename

            ]);
            $user->tranRequest()->save($tranRequest);
            $returnMessages = ["status" => "success", "messages" => "ทำรายการสำเร็จ!!"];
        }
        return redirect('/wallet')->with($returnMessages);
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

    }
}
