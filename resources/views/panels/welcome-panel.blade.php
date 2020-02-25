@php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

@endphp

<div class="card">
    <div class="card-header @role('admin', true) bg-secondary text-white @endrole">

        Welcome {{ Auth::user()->name }}

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
        @role('user', true)
        <a href="{{route('profile.show',Auth::user()->name)}}" ><p>ข้อมูลส่วนตัว</p></a>
        <hr>
        <a href="{{route('gallery.index')}}"><p>อัลบั้ม</p></a>
        <hr>
        <a href="{{route('review.index')}}" ><p> รีวิวจากลูกค้า</p></a>
        <hr>
        <a href="{{route('auth-document.create')}}">การยืนยันโปรไฟล์</a>
        @if($docActive->status==1)
        <span class="pull-right badge badge-success" style="margin-top:4px">
                ยืนยันแล้ว
            </span>
            @else
            <span class="pull-right badge badge-danger" style="margin-top:4px">
                ยังไม่ได้ยืนยัน
            </span>
        @endif
        <hr>
        <a href="wallet"><p>เติมเงิน</p></a>
        @endrole
    </div>
</div>
