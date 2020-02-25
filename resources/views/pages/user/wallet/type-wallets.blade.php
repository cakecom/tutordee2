@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                @php

                    $money=$_GET['money'];
                    $levelAmount = 'level';

                    if (Auth::User()->level() >= 2) {
                        $levelAmount = 'levels';

                    }

                @endphp
                <div class="card">
                    <div class="card-header @role('admin', true) bg-secondary text-white @endrole">

                        เลิอกวิธีเติมเงิน

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
<div class="row">
    <div class="col-md-4">
        <div class="card" >
{{--            <img src="//donemaster.com/images/payments/icon-visa.svg">--}}
{{--            <img src="//donemaster.com/images/payments/icon-mastercard.svg">--}}
            <div class="card-body">
                <h5 class="card-title">จ่ายผ่าน PromptPay QRcode </h5>
                <p class="card-text">ได้รับเงินในบัญชีของคุณ ภายใน 24 ชั่วโมง ชำระผ่าน PromptPay QRcode</p>
                 <a href="{{route('promptpay.create','money='.$money)}}" class="btn btn-primary">เลือก</a>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card">
{{--            <img src="..." class="card-img-top" alt="...">--}}
            <div class="card-body">
                <h5 class="card-title">โอนเงินผ่านธนาคาร</h5>
                <p class="card-text">โอนเงินโดยใช้แอพพลิเคชั่นบนมือถือ, ATM, CDM หรือฝากเงินเข้าบัญชีธนาคารสาขาใดก็ได้ คุณจะได้รับเงินภายใน 24 ชั่วโมง</p>
                <a href="{{route('wallet.create','money='.$money)}}" class="btn btn-primary">เลือก</a>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card">
            {{--            <img src="..." class="card-img-top" alt="...">--}}
            <div class="card-body">
                <h5 class="card-title">จ่ายด้วยบัตรดบิต/เครดิต</h5>
                <p class="card-text">ได้รับเงินในบัญชีของคุณทันที ชำระผ่าน Visa/Master Card ใดๆก็ได้</p>
                <a href="{{route('pay_card','money='.$money)}}" class="btn btn-primary">เลือก</a>
            </div>
        </div>

    </div>
</div>
                    </div>
                </div>

{{--                @include('panels.wallet-panel')--}}

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
