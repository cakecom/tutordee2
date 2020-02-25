<?php

namespace App\Http\Controllers;
use App\Models\doc_request;
//use Auth;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userID=Auth::id();
//        dd($userID);
        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }
        $docActive=doc_request::where('user_id',$userID)->first();
//        dd($docActive);
        return view('pages.user.home',compact('docActive'));
    }
}
