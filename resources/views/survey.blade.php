<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Auth</title>

    <!-- Fonts -->
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Itim&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body, a, h1, h2, h3, h4,h5,label, p {
            font-family: 'Itim', cursive;
        }
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Itim', cursive;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .title small {
            font-size: 60px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        #survey2{
            display: none;
        }
        #survey3{
            display: none;
        }
        #survey4{
            display: none;
        }
        #survey5{
            display: none;
        }
        #survey6{
            display: none;
        }
        #survey7{
            display: none;
        }
        #survey8{
            display: none;
        }
        #survey9{
            display: none;
        }
        #survey10{
            display: none;
        }
        #survey11{
            display: none;
        }
        #survey12{
            display: none;
        }
        #survey13{
            display: none;
        }
        #pre{
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS -->
    {{--    <link href="/css/shop-homepage.css" rel="stylesheet">--}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        /* Background Gradient for Monochromatic Colors */
        .gradient4
        {
            background-color: #FCFFFC;
            /* For WebKit (Safari, Chrome, etc) */
            background: #FCFFFC -webkit-gradient(linear, left top, left bottom, from(#47B747), to(#FCFFFC)) no-repeat;
            /* Mozilla,Firefox/Gecko */
            background: #FCFFFC -moz-linear-gradient(top, #47B747, #FCFFFC) no-repeat;
            /* IE 5.5 - 7 */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#47B747, endColorstr=#FCFFFC) no-repeat;
            /* IE 8 */
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#47B747, endColorstr=#47B747)" no-repeat;
        }
#survey1{

}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light gradient4">
    <a class="navbar-brand" href="/"><span style="color: darkblue">TUTOR</span><span style="color: red"> DEE</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">เกี่ยวกับ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('service.index')}}">บริการ</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('help.create')}}">ช่วยเหลือ</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Terms of service and Policy
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('/termsService')}}">Terms of Service</a>
                    <a class="dropdown-item" href="{{url('/privacy')}}">Privacy Policy</a>
                    <a class="dropdown-item" href="{{url('/refund')}}">Refund Policy</a>
                    <a class="dropdown-item" href="{{url('/cancel')}}">Cancelation Policy</a>
                    {{--                    <a class="dropdown-item" href="{{url('/shippingReturn')}}">Shipping and Return Policy</a>--}}
                </div>
            </li>
        </ul>

        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">หน้าหลัก</a>
                @else
                    <a href="{{ route('login') }}">ลงชื่อเข้าใช้</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">สมัครสมาชิก</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>
<div class="container">
    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        {{--                @method('PATCH')--}}
        @csrf

    <div class="card text-center">
        <div class="card-header">
            ระบบค้นหาคุณครูอัตโนมัติฟรี
        </div>
{{--        <input type="hidden" name="group" value="{{$_GET['group']}}">--}}
        <input type="hidden" name="subject" value="{{$_GET['subject']}}">
        <div id="survey1" class="card-body">
            <h5 class="card-title">คุณต้องการเรียนอะไร</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer1" id="exampleRadios1" value="เรียนตัวต่อตัว">
                <label class="form-check-label" for="exampleRadios1">
                    เรียนตัวต่อตัว
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer2" id="exampleRadios2" value="เรียนออนไลน์ (video call ผ่าน Skype/Line/Facebook)">
                <label class="form-check-label" for="exampleRadios2">
                    เรียนออนไลน์ (video call ผ่าน Skype/Line/Facebook)
                </label>
            </div>


        </div>
        <div id="survey2" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">จังหวัดของคุณ</h5>
            <div id="app">
                <select-location></select-location>
            </div>
{{--          <div class="form-group">--}}
{{--              <select name="province" id="province" class="form-control province">--}}

{{--                  <option value="">เลือกจังหวัด</option>--}}
{{--                  @foreach($list as $row)--}}
{{--                      <option value="{{$row->name_th}}">{{$row->name_th}}</option>--}}
{{--                      @endforeach--}}
{{--                  @csrf--}}
{{--              </select>--}}
{{--          </div>--}}
{{--            <div class="form-group">--}}
{{--                <select name="amphures" id="amphures" class="form-control amphures">--}}
{{--                    <option value="">เลือกอำเภอของท่าน</option>--}}
{{--                </select>--}}
{{--            </div>--}}
        </div>
        <div id="survey3" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">ต้องการเรียนที่ไหน</h5>
            <div class="form-group">
                <div class="checkbox"><label><input type="checkbox" name="สถานที่ติว[]" value="ที่บ้าน/ที่ทำงานของผู้เรียน" checked=""> ที่บ้าน/ที่ทำงานของผู้เรียน</label></div>
                <div class="checkbox"><label><input type="checkbox" name="สถานที่ติว[]" value="ที่บ้านติวเตอร์/ติวเตอร์มีสถานที่" checked=""> ที่บ้านติวเตอร์/ติวเตอร์มีสถานที่</label></div>
                <div class="checkbox"><label><input type="checkbox" name="สถานที่ติว[]" value="สถานที่สาธารณะ" checked=""> สถานที่สาธารณะ</label></div>
            </div>
            <div class="form-group">
                <label for="inpLocation" class="control-label">รายละเอียดเพิ่มเติมเกี่ยวกับสถานที่เรียน (ถ้าต้องการระบุ)</label>
                <input type="text" name="location_details" class="form-control" id="inpLocation">
            </div>

        </div>
        <div id="survey4" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">นักเรียนอายุเท่าไหร่?</h5>
            <div class="form-group">
                <div class="radio"><label><input type="radio" name="ช่วงอายุของนักเรียน" value="1-6 ปี"> 1-6 ปี</label></div>
                <div class="radio"><label><input type="radio" name="ช่วงอายุของนักเรียน" value="7-12 ปี"> 7-12 ปี</label></div>
                <div class="radio"><label><input type="radio" name="ช่วงอายุของนักเรียน" value="13-18 ปี"> 13-18 ปี</label></div>
                <div class="radio"><label><input type="radio" name="ช่วงอายุของนักเรียน" value="19-25 ปี"> 19-25 ปี</label></div>
                <div class="radio"><label><input type="radio" name="ช่วงอายุของนักเรียน" value="26-40 ปี"> 26-40 ปี</label></div>
                <div class="radio"><label><input type="radio" name="ช่วงอายุของนักเรียน" value="41+ ปี"> 41+ ปี</label></div>
            </div>

        </div>
        <div id="survey5" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">ันที่สะดวกสำหรับคุณ?</h5>
            <div class="form-group">
                <div class="checkbox"><label><input type="checkbox" name="dow[]" value="วันจันทร์"> วันจันทร์</label></div>
                <div class="checkbox"><label><input type="checkbox" name="dow[]" value="วันอังคาร"> วันอังคาร</label></div>
                <div class="checkbox"><label><input type="checkbox" name="dow[]" value="วันพุธ"> วันพุธ</label></div>
                <div class="checkbox"><label><input type="checkbox" name="dow[]" value="วันพฤหัสบดี"> วันพฤหัสบดี</label></div>
                <div class="checkbox"><label><input type="checkbox" name="dow[]" value="วันศุกร์"> วันศุกร์</label></div>
                <div class="checkbox"><label><input type="checkbox" name="dow[]" value="วันเสาร์"> วันเสาร์</label></div>
                <div class="checkbox"><label><input type="checkbox" name="dow[]" value="วันอาทิตย์"> วันอาทิตย์</label></div>
            </div>

        </div>


        <div id="survey6" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">ช่วงเวลาใดของวันที่สะดวกสำหรับคุณ?</h5>
            <div class="form-group">

                <div class="checkbox"><label><input type="checkbox" name="pod[]" value="เช้า">เช้า</label></div>
                <div class="checkbox"><label><input type="checkbox" name="pod[]" value="กลางวัน">กลางวัน</label></div>
                <div class="checkbox"><label><input type="checkbox" name="pod[]" value="เย็น">เย็น</label></div>
            </div>
            <div class="form-group">
                <label for="inpTime" class="control-label">เวลาที่แน่นอนที่คุณสะดวก (ถ้ามี)</label>
                <input type="text" name="time_details" class="form-control" id="inpTime">
                <p class="help-block">ตัวอย่างเช่น หลัง 18:00 / 14:30-16:00 เป็นต้น</p>
            </div>
        </div>
        <div id="survey7" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">ผู้เรียนต้องการเริ่มเรียนเมื่อใด?</h5>
            <div class="form-group">
                <div class="radio"><label><input type="radio" name="เวลาที่ต้องการเริ่มเรียน" value="ทันทีที่พบคุณครูที่ผู้เรียนต้องการ" onclick="$('#qDateToStart').hide(100); $('#inpDateToStart').val('')" checked=""> ทันทีที่พบคุณครูที่ผู้เรียนต้องการ</label></div>
                <div class="radio"><label><input type="radio" name="เวลาที่ต้องการเริ่มเรียน" value="ยังไม่แน่ใจ แต่ต้องการเริ่มเรียนเร็วๆนี้" onclick="$('#qDateToStart').hide(100); $('#inpDateToStart').val('')"> ยังไม่แน่ใจ แต่ต้องการเริ่มเรียนเร็วๆนี้</label></div>
                <div class="radio"><label><input type="radio" name="เวลาที่ต้องการเริ่มเรียน" value="" onclick="$('#qDateToStart').show(200); $('#inpDateToStart').focus()"> ผู้เรียนต้องการ ระบุวันที่</label></div>
                <div id="qDateToStart" style="margin-left: 25px; display: none">
                    <label for="inpDateToStart" class="control-label">วันที่ต้องการเริ่มเรียน:</label>
                    <input id="inpDateToStart" type="text" name="วันที่ต้องการเริ่มเรียน" class="form-control">
                    <p class="help-block">ตัวอย่าง: เดือนหน้า / 1 มิ.ย. / ...</p>
                </div>
                <div class="radio" style="margin-top: -5px"><label><input type="radio" name="เวลาที่ต้องการเริ่มเรียน" value="ไม่ใช่ตอนนี้ ไม่รู้เมื่อใด" onclick="$('#qDateToStart').hide(100); $('#inpDateToStart').val('')"> ไม่ใช่ตอนนี้ ไม่รู้เมื่อใด</label></div>
            </div>
        </div>
        <div id="survey8" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">ความต้องการอื่นๆ</h5>
            <div class="form-group">
                <label for="inpExtraReq" class="control-label"></label>
                <textarea name="อื่นๆ" class="form-control" rows="3" id="inpExtraReq"></textarea>
            </div>
        </div>
        <div id="survey9" class="card-body" style="max-width: 300px;margin: auto">
            <h5 class="card-title">แบบฟอร์มใกล้เสร็จเรียบร้อยแล้ว เหลือแค่ 2 คำถามเท่านั้น</h5>
            <div class="form-group">
                <label for="inpName" class="control-label">ชื่อเล่นของคุณ</label>
                <input type="text" name="name" class="form-control" id="inpName">
            </div>
            <div class="form-group">
                <label class="control-label">การติดต่อวิธีใดที่สะดวกสำหรับคุณมากที่สุด?</label>
                <div class="radio"><label><input type="radio" name="ลูกค้าต้องการให้ติดต่อผ่าน" value="โทรผ่านเบอร์มือถือ" onclick="$('#qFacebook').hide(); $('#qLINE').hide();" checked=""> โทรผ่านเบอร์มือถือ</label></div>
                <div class="radio"><label><input type="radio" name="ลูกค้าต้องการให้ติดต่อผ่าน" value="Facebook" onclick="$('#qFacebook').show(); $('#qLINE').hide();"> Facebook</label></div>
                <div class="radio"><label><input type="radio" name="ลูกค้าต้องการให้ติดต่อผ่าน" value="LINE" onclick="$('#qFacebook').hide(); $('#qLINE').show();"> LINE</label></div>
            </div>
        </div>
        <div id="survey10" class="card-body" style="max-width: 300px;margin: auto">

            <div class="form-group">
                <label for="inpPhone" class="control-label">เบอร์โทรศัพท์มือถือของคุณ</label>
                <input type="tel" name="phone" class="form-control" id="inpPhone" pattern="0[689][0-9]{8}" placeholder="รูปแบบ เช่น 0987654321">

            </div>
            <div class="form-group">
                <label for="email" class="control-label">Email ของคุณ</label>
                <input type="email" name="email" class="form-control" id="email"  placeholder="email" required>
                <p class="help-block">เราจะส่งข้อความไปที่อีเมลล์นี้เพื่อคอนเฟิร์มแบบฟอร์ม</p>
            </div>
            <div class="form-group" id="qFacebook" style="display: none">
                <label for="inpFacebook" class="control-label">ชื่อหรือเบอร์โทรสำหรับ Facebook</label>
                <input type="text" name="Facebook" class="form-control" id="inpFacebook">
            </div>
            <div class="form-group" id="qLINE" style="display: none">
                <label for="inpLine" class="control-label">Line ID (ถ้าคุณมี)</label>
                <input type="text" name="LINE" class="form-control" id="inpLine">
            </div>
        </div>
        <div class="card-footer text-muted">
            <div class="row">
                <div class="col">
                    <a id="pre" href="#" class="btn btn-danger">กลับ</a>
                </div>
                <div class="col">
                    <a id="next" href="#" class="btn btn-primary">ต่อไป</a>
                    <button id="submit" type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>




{{csrf_field()}}
</body>
</html>
<script src="{{ mix('/js/app.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#submit').hide();
        var n=1;
        var p=1;
        $("#next").click(function(){
            var page = "#survey";
            var pre=page+n;
            n++;
            var current=page+n;
            /*alert(pre);*/
            $(pre).hide();
            $(current).show();
            console.log(pre+"hide");
            console.log(current+"show");
            $("#pre").show();
            if(n===10){
                $("#next").hide();
                $("#pre").show();
                $("#submit").show();
            }
        });
        $("#pre").click(function(){
            $("#submit").hide();
            var page = "#survey";
            var next=page+n;
            n--;
            var current=page+n;
            /*alert(pre);*/
            $(current).show();
            $(next).hide();
            $("#next").show();
            if(n===1){
                $("#pre").hide();
            }
        });

        {{--$('.province').change(function () {--}}
        {{--    if ($(this).val() !== '') {--}}
        {{--        var select = $(this).val();--}}
        {{--        var _token = $('input[name="_token"]').val();--}}

        {{--        $.ajax({--}}
        {{--            url: "{{route('fetch')}}",--}}
        {{--            method: "POST",--}}
        {{--            data: {select: select, _token: _token},--}}
        {{--            success: function (result) {--}}
        {{--                $('.amphures').html(result);--}}
        {{--                // alert(result);--}}
        {{--            }--}}
        {{--        });--}}
        {{--        // console.log(select);--}}
        {{--    }--}}
        {{--});--}}
    });
</script>