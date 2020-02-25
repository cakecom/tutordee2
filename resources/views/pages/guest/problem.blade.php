@extends('layouts.app')

@section('template_title')
    {{--    {{ Auth::user()->name }}'s' Homepage--}}
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                @include("layouts.alert")
<div class="card">
                <div class="card-header">
                    แจ้งปัญหาเกี่ยวกับการใช้งาน
                </div>

                <div class="card-body">
                    <form action="{{route('help.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">อีเมลล์</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="อีเมลล์" required>
                        </div>
                        <div class="form-group">
                            <label for="title">เรื่องที่แจ้ง</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="เรื่องที่แจ้ง" required>
                        </div>
                        <div class="form-group">
                            <label for="details">รายละเอียด</label>
                            <textarea class="form-control" id="details"  name="details" rows="3"></textarea>

                        </div>
                        <button type="submit" class="btn btn-lg btn-success">ยืนยัน</button>
                    </form>
                </div>
</div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection

