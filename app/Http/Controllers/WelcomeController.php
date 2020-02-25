<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\ConfirmMail;
use App\Mail\Newjob;
use App\Mail\NewjobsMail;
use App\Models\Subject;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $data=DB::table('groups')->get();

        return view('welcome')->with('data',$data);
    }
    public function index(){
        return view('show-find-tutor');
    }
    public function store(Request $request)
    {
//        dd($request);
        $location=implode(", ",$request->สถานที่ติว);
        $emailCustomer=$request->email;
        $days=implode(", ",$request->dow);
        $duration=implode(", ",$request->pod);
//        $surveyRequest = new Survey([
//            'group' => $request->group,
//            'subject' => $request->subject
//
//        ]);
        $surveyRequest = new Survey;
        $data=[
            $surveyRequest->group = $request->group,
            $surveyRequest->subject = $request->subject,
            $surveyRequest->province = $request->province,
            $surveyRequest->amphures = $request->amphures,
            $surveyRequest->age = $request->ช่วงอายุของนักเรียน,
            $surveyRequest->days = $days,
            $surveyRequest->duration = $duration,
            $surveyRequest->start = $request->เวลาที่ต้องการเริ่มเรียน,
            $surveyRequest->phone = $request->phone,
            $surveyRequest->name = $request->name,
            $surveyRequest->email = $request->email,
        ];
        $customer = new Customer;
        $password=Hash::make(str_random(8));
        $customerData=[
          $customer->email=$request->email,
            $customer->password=$password,

        ];
        $subjectUser=User::select('email')->where('subject_id',$request->subject)->get()->toArray();
        $address_ary=array();
     foreach ($subjectUser as $address){
         array_push($address_ary,$address['email']);
     }

//     dd($address_ary);
//            $subjectName=Subject::find($request->subject);
            $surveyRequest->save($data);
            $customer->save($customerData);
        $dataMail=[
            'name'=>$request->name,
            'subject'=>$request->subject,
            'province'=>$request->province,
            'survey_id'=>$surveyRequest->id,
            'password'=>$password
        ];
        Mail::to($emailCustomer)
            ->queue(new ConfirmMail($dataMail));
        if(count($address_ary)>0) {
            Mail::to($address_ary)
                ->queue(new NewjobsMail($dataMail));
        }
        return redirect('/');
        //
    }
    public function survey(){
        $list=DB::table('provinces')->get();

        return view('survey')->with('list',$list);
    }
    public function fetch(Request $request){
        $id= $request->get('select');
//        $result=array();
        $query=DB::table('provinces')
            ->join('amphures','provinces.id','=','amphures.province_id')
            ->select('amphures.name_th')
            ->where('provinces.name_th',$id)
            ->groupBy('amphures.name_th')
            ->get();
        $output='<option value="">เลือกอำเภอของเท่าน</option>';
        foreach ($query as $row){
            $output.='<option value="'.$row->name_th.'">'.$row->name_th.'</option>';
        }
        echo $output;
    }

    public function fetch2(Request $request){
        $id= $request->get('select');
//        $result=array();
        $query=DB::table('groups')
            ->join('subjects','groups.id','=','subjects.group_id')
            ->select('subjects.subject_name')
            ->where('groups.group_name',$id)
            ->groupBy('subjects.subject_name')
            ->get();
        $output='<option value="">เลือกวิชาหรือบทเรียน</option>';
        foreach ($query as $row){
            $output.='<option value="'.$row->subject_name.'">'.$row->subject_name.'</option>';
        }
        echo $output;
    }
}
