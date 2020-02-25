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
                <div class="card">
                <div class="card-header">

                    <h3 style="text-align: center">เราจะช่วยคุณหาครูสอน{{$subject['subject_name']}}</h3>
                            <form action="{{route('survey')}}">

                                                        <div class="form-group">
                                                            <label for="subject">เลือกวิชาหรือบทเรียน</label>
                                                            <select class="form-control" name="subject"  id="subject">
                                                                <option value="{{$subject['id']}}" >{{$subject['subject_name']}}</option>
                                                            </select>
                                                        </div>

                                <button type="submit" style="background-color: #77dd91;width: 100%" class="btn ">ยืนยัน</button>
                            </form>


                </div>
                @foreach($user as $users)



                        <div class="row">
                        @foreach($users->gallery as $images)
                                <div class="col-xs-6 col-sm-4">
                            <a href="{{url('tutor-profile/'.$users->id)}}"> <img class="card-img-top"  style="padding: 20px;width: 250px;margin: auto" src="/images/uploads/{{$users->id}}/{{$images['image']}}" alt="Card image cap"></a>
                                </div>
                        @endforeach
                            </div>
                        <div class="card-body">

                            <a href="{{url('tutor-profile/'.$users->id)}}"> <h5 class="card-title">{{$users->name}}</h5></a>
                            <p class="card-text">{{$users->profile['bio']}}</p>
                        </div>


                    <hr>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection

