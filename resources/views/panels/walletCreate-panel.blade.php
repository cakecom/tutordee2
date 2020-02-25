@php
$money=$_GET['money'];
$levelAmount = 'level';

if (Auth::User()->level() >= 2) {
$levelAmount = 'levels';

}

@endphp
<div class="card">
    <div class="card-header @role('admin', true) bg-secondary text-white @endrole">

        เติมเงิน

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
<h1>วิธีโอนเงิน</h1>
        <p>โอนเงินจำนวน <code>{{base64_decode(urldecode($money))}}</code> เข้าบัญชีใดบัญชีหนึ่งด้านล่าง<br>
            คุณสามารถโอนเงินจากบัญชีของคุณโดยธนาคารใดก็ได้ในประเทศไทย(กรณีโอนต่างธนาคารอาจเสียค่าธรรมเนียม)<br>
            หรือเลือกฝากเงินสดเข้าบัญชีใดบัญชีหนึ่งตามธนาคารและเลขที่บัญชีที่แสดงด้านล่าง</p>
        <div class="billing-bank-account">
            <img src="//donemaster.com/images/payments/icon-kasikorn.svg" alt="Kasikorn">
            <h4>ธนาคารกสิกรไทย</h4>
            <p class="account-number"><span>011-1-17562-4</span></p>
            <p>นาง สุมิตรา อูกนิช; สาขาหัวหมาก ทาวน์ เซ็นเตอร์</p>
        </div>
        <div class="alert alert-warning" id="upload">
            <p><b>สำคัญ!</b></p>
            <p>หลังจากคุณได้ดำเนินการโอนเงินแล้ว คุณจำเป็นต้องส่งรูปภาพหลักฐานการโอนเงิน
                (screenshot จากการโอนเงินออนไลน์, รูปภาพของสลิป ATM, หรือใบเสร็จการโอนเงิน)
                มิเช่นนั้นเราจะไม่สามารถทราบได้ว่าใครเป็นผู้โอนเงิน และคุณจะไม่ได้รับเงินเข้าระบบ</p>
            <p>โปรดแน่ใจว่าหลักฐานการโอนเงินแสดงวันที่ชัดเจน</p>
            <p>โปรดส่งรูปภาพหลักฐานการโอนเงินที่นี่:</p>

            <form action="{{route('wallet.store')}}" method="post" enctype="multipart/form-data">
{{--                @method('PATCH')--}}
                @csrf
                <input type="hidden" id="wallet_type" name="wallet_type" value="2">
                <div class="form-group">
                    <label for="amount">จำนวน</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{base64_decode(urldecode($money))}}" disabled>
                </div>
                <div class="form-group" style="margin-top: 10px">
                    <input type="file" name="file" accept="image/*" required="">
                    <p class="help-block">รูปภาพในรูปแบบ JPG หรือ PNG ขนาดไม่เกิน 10Mb</p>
                </div>
                <button type="submit" class="btn btn-primary">ส่งรูปภาพ</button> <span class="spinner glyphicon glyphicon-refresh fa-spin" style="display: none"></span>
            </form>
        </div>
        <p>พนักงานของเราจะตรวจสอบการชำระเงินของคุณและเราจะส่งการแจ้งเตือนไปให้คุณในอีเมล
            หลังจากที่คุณได้รับการแจ้งเตือนผ่านอีเมล คุณจะสามารถกดเปิดข้อมูลการติดต่อของลูกค้าได้ทันที</p>
        <div class="well" style="background-color: yellow">
            <p>หากคุณไม่มีหลักฐานการโอนเงิน โปรดติดต่อเราที่อีเมล <a href="mailto:tutordee2019@gmail.com">tutordee2019@gmail.com</a> และพร้อมด้วยข้อมูลด้านล่างนี้</p>
            <ul style="padding-left: 25px">
                <li>วันและเวลาที่แน่นอนที่คุณโอนเงิน (สำคัญมาก)</li>
                <li>ชื่อและเลขที่ธนาคารที่คุณโอนเงินเข้ามา</li>
                <li>ชื่อธนาคาร เลขที่บัญชี และชื่อบัญชีที่คุณใช้โอนเงินเข้ามา</li>
                <li>วิธีที่คุณโอน: โอนเงินออนไลน์, ATM, CDM, ฝากเงินเข้าธนาคาร เป็นต้น</li>
                <li>หากคุณโอนเงินผ่าน ATM/CDM/ฝากเงินเข้าธนาคาร โปรดระบุสถานที่ของเครื่องหรือสาขาของธนาคารที่ฝากเงินเข้ามาด้วย</li>
            </ul>
            <p style="margin-bottom: 0">ยิ่งคุณให้ข้อมูลมาก เราก็จะสามารถหาการโอนเงินของคุณได้เร็วขึ้น โปรดพึงระลึกว่าในบางสถานการณ์ การดำเนินการอาจใช้เวลาตั้งแต่ 2 วันขึ้นไปในการตรวจสอบการโอนเงินของคุณ</p>
        </div>
    </div>
</div>

