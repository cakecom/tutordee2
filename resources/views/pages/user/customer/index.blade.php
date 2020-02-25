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
                   ลูกค้าทั้งหมด
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($data as $row)
                            <div class="col-md-6">
                                <div class="card text-white  mb-3" style="background-color:white ">
                                    <div class="card-header" style="color: black">{{$row->name}}</div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group input-group">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-chalkboard-teacher"></i> </span>
                                                </div>
                                                <input name="" class="form-control"  value="{{$row->subjects['subject_name']}}"  placeholder="ลูกค้าต้องการ" type="text" readonly>
                                            </div> <!-- form-group// -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
                                                </div>
                                                <input name="" class="form-control" value="{{$row->province}},{{$row->amphures}}" placeholder="สถานที่" type="text" readonly>
                                            </div>
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="far fa-calendar-alt"></i> </span>
                                                </div>
                                                <input class="form-control" value="{{$row->days}}" placeholder="วันที่นัด" type="text" readonly>
                                            </div> <!-- form-group// -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-user-clock"></i> </span>
                                                </div>
                                                <input class="form-control" value="{{$row->duration}}" placeholder="ช่วงเวลา" type="text"  readonly>
                                            </div> <!-- form-group// -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="far fa-clock"></i> </span>
                                                </div>
                                                <input class="form-control" value="{{$row->meet}}" placeholder="เวลา" type="text" readonly>
                                            </div> <!-- form-group// -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-info"></i> </span>
                                                </div>
                                                <input class="form-control"  value="{{$row->meet}}" placeholder="จำนวนครั้งในการเรียน" type="text" readonly>
                                            </div> <!-- form-group// -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-info"></i> </span>
                                                </div>
                                                <input class="form-control"  value="{{$row->age}}" placeholder="อายุ" type="text" readonly>
                                            </div> <!-- form-group// -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                                </div>
                                                <input name="" class="form-control"  value="{{substr($row->phone, 0, 7)}}xxx" placeholder="Phone number" type="text" readonly>
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
                                                <input name="" class="form-control" value="30"   placeholder="ค่าบริการ" type="text" readonly>
                                            </div> <!-- form-group// -->
                                            <div class="form-group">
                                                <a   style="background-color: #faa98b;" href="{{route('customer.show',$row->id)}}" type="button" class="btn  btn-block"> ติดต่อลูกค้า  </a>
                                            </div> <!-- form-group// -->

                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
