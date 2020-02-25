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
                                 $money=(int)base64_decode(urldecode($_GET['money']));
                                 $money2=500;
                                $levelAmount = 'level';

                                if (Auth::User()->level() >= 2) {
                                    $levelAmount = 'levels';

                                }

                @endphp
                <div class="card">
                    <div class="card-header @role('admin', true) bg-secondary text-white @endrole">

                        เติมเงินผ่านบัตรเครดิต

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
                        <div class="row"  style="padding: 20px"  >
                            <div class="col-md-6" style="text-align:center ">
                                <img src="//donemaster.com/images/payments/icon-visa.svg">
                            </div>
                            <div class="col-md-6" style="text-align:center ">
                                <img src="//donemaster.com/images/payments/icon-mastercard.svg">
                            </div>
                        </div>
                        <div class="card border-primary mb-3">
                            <div class="card-header">เลือกจำนวนเงินที่ต้องการเติม</div>
                            <div class="card-body text-primary">
                                <h5 class="card-title">เลือกจำนวนเงิน</h5>
                                <div class="card-text">
{{--                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
                                    <form id="checkoutForm" method="POST" action="{{route('wallet.store')}}">
                                        @csrf
                                        <input   type="hidden" id="amount" name="amount" value="{{$money}}" >
                                        <input type="hidden" name="wallet_type" value="1">
                                        <input type="hidden" name="omiseToken">
                                        <input type="hidden" name="omiseSource">
                                        <button type="submit" id="checkoutButton">Checkout</button>
                                    </form>

{{--                                    <script type="text/javascript" src="https://cdn.omise.co/omise.js">--}}
{{--                                    </script>--}}

{{--                                    <script>--}}
{{--                                        $( document ).ready(function() {--}}
{{--                                            // var amount = $("#amount").val();--}}
{{--                                            OmiseCard.configure({--}}
{{--                                                publicKey: "pkey_test_5irkvg6mqwgdrfvgvzb"--}}
{{--                                            });--}}

{{--                                            var button = document.querySelector("#checkoutButton");--}}
{{--                                            var form = document.querySelector("#checkoutForm");--}}

{{--                                            button.addEventListener("click", (event) => {--}}
{{--                                                event.preventDefault();--}}
{{--                                                var amount = $("#amount").val();--}}

{{--                                                OmiseCard.open({--}}
{{--                                                    amount: amount+"00",--}}
{{--                                                    currency: "THB",--}}
{{--                                                    defaultPaymentMethod: "credit_card",--}}
{{--                                                    onCreateTokenSuccess: (nonce) => {--}}
{{--                                                        if (nonce.startsWith("tokn_")) {--}}
{{--                                                            form.omiseToken.value = nonce;--}}
{{--                                                        } else {--}}
{{--                                                            form.omiseSource.value = nonce;--}}
{{--                                                        }--}}
{{--                                                        ;--}}
{{--                                                        form.submit();--}}
{{--                                                    }--}}
{{--                                                });--}}
{{--                                            });--}}
{{--                                        });--}}
{{--                                    </script>--}}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>
    <script>
        $( document ).ready(function() {
            // var amount = $("#amount").val();
            OmiseCard.configure({
                publicKey: "pkey_test_5irkvg6mqwgdrfvgvzb"
            });

            var button = document.querySelector("#checkoutButton");
            var form = document.querySelector("#checkoutForm");

            button.addEventListener("click", (event) => {
                event.preventDefault();
                var amount = $("#amount").val();

                OmiseCard.open({
                    amount: amount+"00",
                    currency: "THB",
                    defaultPaymentMethod: "credit_card",
                    onCreateTokenSuccess: (nonce) => {
                        if (nonce.startsWith("tokn_")) {
                            form.omiseToken.value = nonce;
                        } else {
                            form.omiseSource.value = nonce;
                        }
                        ;
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
