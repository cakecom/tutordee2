@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')
    @include("layouts.alert")
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">

                <div class="card">
                    <div class="card-header">
                        Gallery
                    </div>
                    <div class="card-body">
                        <p>ในหน้านี้คุณสามารถสร้างอัลบัมรูปภาพเพื่อแสดงในโปรไฟล์ของคุณ คุณสามารถเผยแพร่รูปภาพประกาศนียบัตร ปริญญาบัตร รางวัล หรือใบอนุญาตต่างๆ นอกจากนั้นคุณยังสามารถอัปโหลดรูปภาพสถานที่ทำงานของคุณ รูปภาพคุณทำงานกับลูกค้า หรือรูปภาพใดๆที่เกี่ยวข้องกับงานของคุณ</p>
                        <p>อย่าอัปโหลดรูปภาพหลายรูปเกินไป อาจจะทำให้ลูกค้าไม่อยากเปิดดูได้ เราแนะนำให้คุณอัปโหลดรูปภาพที่สำคัญจริงๆเท่านั้น</p>
                        <hr>
                        <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="file_type" value="gallery">
                            <div class="well" style="margin-top: 15px">
                                <h4 style="margin-top: 0; margin-bottom: 15px">อัปโหลดรูปภาพใหม่:</h4>
                                <div class="form-group" style="margin-top: 10px">
                                    <input type="file" name="file" accept="image/jpeg" required="">
                                    <p class="help-block">รูปภาพในรูปแบบ JPG ขนาดไม่เกิน 10Mb</p>
                                </div>
                                <button type="submit" class="btn btn-primary">ส่งรูปภาพ</button> <span class="spinner glyphicon glyphicon-refresh fa-spin" style="display: none"></span>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            @foreach($gallery as $galleries)
                            <div class="col-xs-6 col-sm-4">
                        <img src="images/uploads/{{Auth::user()->id}}/{{$galleries->image}}" alt="..." class="img-thumbnail">
                                <div class="row" style="padding: 20px">
                                    <div class="col-md-6">
                                        <form action="{{route('gallery.update',$galleries->id)}}" method="post">
                                            @method('patch')
                                            @csrf
                                            @if($galleries->status==1)
                                                <button type="submit" class="btn btn-default" disabled>แสดงรูปแรก</button>
                                                @else
                                                <button type="submit" class="btn btn-primary">แสดงรูปแรก</button>
                                                @endif

                                        </form>
                                    </div>
                                <form action="{{route('gallery.destroy',$galleries->id)}}" method="post">
                                    @method('delete')
                                @csrf
                                    <div class="col-md-6">
                                <button type="submit" class="btn btn-danger">ลบ</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                                @endforeach
                        </div>
                        <hr>
                        <div class="alert alert-warning">
                            <p>กรุณาไม่อัปโหลดรูปภาพที่มีข้อมูลการติดต่อ เนื้อหาที่มีลิขสิทธิ์ รูปภาพผิดกฏหมายหรือมีลักษณะล่วงละเมิด เราขอสงวนสิทธิ์ในการลบรูปภาพดังกล่าวโดยไม่ต้องแจ้งให้ทราบล่วงหน้า</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection

