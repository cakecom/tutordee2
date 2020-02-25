@php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

@endphp

<div class="card">
    <div class="card-header @role('admin', true) bg-secondary text-white @endrole">

       ระบบเติมเงิน

        @role('admin', true)
        <span class="pull-right badge badge-primary" style="margin-top:4px">
                Admin Access
            </span>
        @else
            <span class="pull-right badge badge-warning" style="margin-top:4px">
                User Access
            </span>
            @endrole

    </div>
    <div class="card-body">
        <div class="alert alert-primary" role="alert">
            ยอดเงินในบัญชีคงเหลือ  {{$balance}} บาท
{{--            <span class="pull-right badge badge-success" style="font-size: 18px">--}}
{{--                <a style="color: white" href="/type-wallets">เติมเงิน</a>--}}
{{--            </span>--}}
        </div>
        <div class="alert alert-danger" role="alert">
           <div class="card">
               <div class="card-header">
                   <h3>เติมเงินเข้าสู่ระบบ</h3>
               </div>
               <div class="card-body">
                   <div class="row">

                       <div class="col-md-4" style="border:solid red ;border-radius: 16px;">
                           <a href="{{url('type-wallets?money='.$money=urlencode(base64_encode(200)))}}"><h2>แพ็กเกจเติมเงิน 200</h2></a>
                       </div>
                       <div class="col-md-4" style="border:solid dodgerblue;border-radius: 16px;">
                           <a href="{{url('type-wallets?money='.$money=urlencode(base64_encode(400)))}}"><h2>แพ็กเกจเติมเงิน 400</h2></a>
                       </div>
                       <div class="col-md-4" style="border:solid green;border-radius: 16px;">
                           <a href="{{url('type-wallets?money='.$money=urlencode(base64_encode(600)))}}"><h2>แพ็กเกจเติมเงิน 600</h2></a>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        @foreach($tranRequest as $tranRequests)
            @if($tranRequests->status==0    )
        <div class="alert alert-warning" role="alert">
            รอดำเนินการยืนยัน 1 รายการ
        </div>
            @endif
        @endforeach
    </div>
</div>
<div style="margin-top: 30px"  class="card">
    <div class="card-header @role('admin', true) bg-secondary text-white @endrole">
        ประวัติทางการเงิน
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">เวลาดำเนินการ</th>
                <th scope="col">ฝาก/ถอน</th>
                <th scope="col">จำนวนเงิน</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tran as $trans)
                <tr>
                    <td>{{$trans->created_at}}</td>
                    <td>@if($trans->type=='deposit')
                            ฝาก
                        @else
                            ถอน
                        @endif
                    </td>
                    <td>{{$trans->amount}}</td>
                </tr>
            @endforeach


            </tbody>
        </table>

    </div>
</div>
