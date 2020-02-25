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

                {{--                @include('panels.wallet-panel')--}}
                <div class="card" style="background-color: #e6aecf">
                    <div class="card-header">
                        ลูกค้า
                    </div>
                    <div class="card-body">
                        <div class="row">
{{--                            @foreach($data as $row)--}}
                                <div class="col-md-12">
                                    <div class="card text-white  mb-3" >
                                        <div class="card-header"  style="color: black">{{$data->name}}</div>
                                        <div class="card-body">
                                                <div class="form-group input-group">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-chalkboard-teacher"></i> </span>
                                                    </div>
                                                    <input name="" class="form-control"  value="{{$data->subjects['subject_name']}}"  placeholder="ลูกค้าต้องการ" type="text" readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
                                                    </div>
                                                    <input name="" class="form-control" value="{{$data->province}},{{$data->amphures}}" placeholder="สถานที่" type="text" readonly>
                                                </div>
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="far fa-calendar-alt"></i> </span>
                                                    </div>
                                                    <input class="form-control" value="{{$data->days}}" placeholder="วันที่นัด" type="text" readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-user-clock"></i> </span>
                                                    </div>
                                                    <input class="form-control" value="{{$data->duration}}" placeholder="ช่วงเวลา" type="text"  readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="far fa-clock"></i> </span>
                                                    </div>
                                                    <input class="form-control" value="{{$data->meet}}" placeholder="เวลา" type="text" readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-info"></i> </span>
                                                    </div>
                                                    <input class="form-control"  value="{{$data->meet}}" placeholder="จำนวนครั้งในการเรียน" type="text" readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-info"></i> </span>
                                                    </div>
                                                    <input class="form-control"  value="{{$data->age}}" placeholder="อายุ" type="text" readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                                    </div>
                                                    @if($data2['survey_regis']==$data->id)
                                                        <input name="" class="form-control"  value="{{$data->phone}}" placeholder="Phone number" type="text" readonly>
                                                    @else
                                                    <input name="" class="form-control"  value="{{substr($data->phone, 0, 7)}}xxx" placeholder="Phone number" type="text" readonly>
                                                    @endif
                                                </div> <!-- form-group// -->
                                                <!-- form-group end.// -->

                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fab fa-line"></i> </span>
                                                    </div>
                                                    <input class="form-control" placeholder="line" type="text" readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-dollar-sign"></i> </span>
                                                    </div>
                                                    <input name="" class="form-control" value="{{$data->service_charge}}"   placeholder="ค่าบริการ" type="text" readonly>
                                                </div> <!-- form-group// -->
                                                <div class="form-group">

                                                        <button   style="background-color: #faa98b;color: black" type="submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn  btn-block"> แสดงข้อมูลการติดต่อ  </button>


                                                </div> <!-- form-group// -->

                                        </div>
                                    </div>
                                </div>
{{--                            @endforeach--}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        ยืนยันการชำระเงิน
                    </div>
                    <div class="modal-body">
                       คุณแน่ใจว่าต้องการชำระเงินเป็นจำนวน {{$data->service_charge}} บาท?

                        <!-- We display the details entered by the user here -->


                    </div>

                    <div class="modal-footer">
                        <form action="{{route('customer.update',$data->id)}}" method="post">
                            @method('PATCH')
                            @csrf
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" id="submit" class="btn btn-success success">ตกลก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
