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

                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">การยืนยันชื่อจริงของคุณในโปรไฟล์</h1>
                        <hr>
                        <p>เราให้คุณได้ทำการยืนยันโปรไฟล์ของคุณและรับเครื่องหมายยืนยันสีเขียว "ชื่อที่ได้รับการยืนยัน"
                            ด้านหลังชื่อของคุณ ลูกค้าทุกคนที่เข้ามาอ่านโปรไฟล์ของคุณจะเห็นเครื่องหมายนี้
                            โดยการยืนยันโปรไฟล์จะทำให้ลูกค้ารู้สึกปลอดภัยมากขึ้นที่จะติดต่อกับคุณและเพิ่มความน่าเชื่อถือให้แก่เจ้าของโปรไฟล์
                            การยืนยันโปรไฟล์และรับเครื่องหมายยืนยันจากเว็บไซต์ คุณต้องสแกนหรือส่งรูปถ่ายบัตรประชาชนของคุณมาที่เรา</p>
                        <ul style="padding-left: 25px">
                            <li>เรารับบัตรประชาชนหรือ International Passport เท่านั้น ไม่รับเอกสารอื่น เช่น บัตรนักเรียน ใบขับขี่ หรือบัตรข้าราชการ</li>
                            <li>หากคุณต้องการยืนยันโปรไฟล์ในฐานะบริษัท โปรดส่งหลักฐานการจดทะเบียนธุรกิจหรือบริษัท</li>
                            <li>เอกสารที่ส่งมาต้องไม่เป็นเอกสารที่หมดอายุแล้ว</li>
                            <li>คุณสามารถส่งรูปถ่ายของเอกสารหรือสำเนาของเอกสารก็ได้</li>
                            <li>ขนาดและคุณภาพของรูปถ่ายต้องสามารถแสดงข้อมูลต่อไปได้: ชื่อในภาษาไทยและภาษาอังกฤษ รหัสประจำตัวประชาชน วันที่หมดอายุของเอกสาร รูปภาพของเจ้าของเอกสาร</li>
                            <li>คุณสามารถเขียนหรือใส่ข้อความใดๆลงในเอกสารได้ โดยข้อความนั้นต้องไม่ปกปิดข้อมูลด้านบนที่กล่าวมาแล้ว</li>
                            <li>บริการนี้เป็นบริการฟรีไม่เสียค่าใช้จ่ายใดๆ</li>
                            <li>เอกสารเหล่านี้จะถูกตรวจสอบโดยพนักงานของเรา เราจะไม่แสดงบนหน้าเว็บไซต์</li>
                        </ul>
                        <p>ภายใน 3 วัน พนักงานจะตรวจสอบเอกสารของคุณและใส่เครื่องหมายยืนยัน "ชื่อที่ได้รับการยืนยัน" ในโปรไฟล์ของคุณ
                            คุณจะได้รับอีเมลการแจ้งเตือนเมื่อพนักงานได้ทำการยืนยันโปรไฟล์ของคุณเรียบร้อยแล้ว</p>
                        <hr>
                        <form action="{{route('auth-document.store')}}" method="post" enctype="multipart/form-data" class="form-inline" onsubmit="$('button[type=submit]').addClass('disabled'); $('.spinner').show();">
                            <input type="hidden" name="file_type" value="documents">
                            <input type="hidden" name="next" value="/profile/documents">
                            @csrf
                            <input type="hidden" id="wallet_type" name="wallet_type" value="2">
                            <div class="panel panel-info" style="margin-top: 20px">
                                <div class="panel-body bg-info" style="padding: 20px">
                                    <h4 style="margin-top: 0">ส่งรูปภาพเอกสารยืนยันตัวบุคคลของคุณให้แก่พนักงานของเรา:</h4>

                                        <div class="form-group">
                                            <label>เลือกรูปภาพบัตรประชาชน/passportของคุณ</label>

                                            <input class="form-control" type="file" name="file" accept="image/*" required="required">
                                            <p class="help-block">รูปภาพในรูปแบบ JPG ขนาดไม่เกิน 10Mb</p>
                                        </div>

                                    <div>
                                        <button type="submit" class="btn btn-success">ส่งรูปภาพ</button>  <span class="spinner glyphicon glyphicon-refresh fa-spin" style="display: none"></span>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
