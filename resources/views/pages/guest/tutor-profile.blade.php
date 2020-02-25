@extends('layouts.app')

@section('template_title')
    {{--    {{ Auth::user()->name }}'s' Homepage--}}
@endsection

@section('template_fastload_css')

@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
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
                    </div>
                    <div class="card-header">
                        Tutor Profile
                        <div style="float: right">
                            <span>{{ $user->ratings->count('rating') }} Reviews</span>
                            <div class="course-rating">
                                @for($r=1;$r<=5;$r++)
                                    <span class="fa fa-star {{ $r <= $user->ratings->avg('rating') ? 'checked-vpage' : ''}}"></span>
                                @endfor
                            </div>
                            <a href="javascript::void(0);" class="btn btn-ulearn-cview mt-1" data-toggle="modal" data-target="#rateModal">RATE PROFILE</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-5">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach($user->gallery as $images)

                                        @if($i==1)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="/images/uploads/{{$user->id}}/{{$images['image']}}" alt="{{$images['image']}}">
                                        </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="/images/uploads/{{$user->id}}/{{$images['image']}}" alt="{{$images['image']}}">
                                                </div>
                                            @endif
                                            @php
                                            echo $i;
                                                $i=$i+1;
                                            @endphp
                                     @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                  </div>
                    <div class="col-md-7 col-lg-6">
                        <h1>{{$user->name}}</h1>
                        <hr>
                        <p>{{$user->profile['bio']}}</p>

                    </div>
                        </div>

                    </div>
                    <div class="card-header">
                        <h1>รีวิวจากคนที่มาเรียน</h1>
                    </div>
                    <div class="card-body">
                        @foreach($user->ratings as $reviews)

                            <h3>{{$reviews['name']}}</h3>
                            <p>{{$reviews['comments']}}</p>
                            <hr>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal start -->
        <div class="modal" id="rateModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bi-header ">
                        <h5 class="col-12 modal-title text-center bi-header-seperator-head">Rate the Course</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="becomeInstructorForm">
                        <form id="rateCourseForm" class="form-horizontal" method="POST" action="{{ route('tutor-profile.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="course_id">
                            <input type="hidden" name="rating" id="rating">
                            <input type="hidden" name="rating_id">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <div class="px-4 py-2">
                                <div class="form-group">
                                    <label>Your Rating</label>
                                    <div class="row">
                                        <div class="col-7 pl-2">
                                            <div id="rateYo"></div>
                                        </div>
                                        <div class="col-5">
{{--                                            @if($course_rating->id)--}}
{{--                                                <a class="btn btn-sm btn-block delete-review delete-record" href="{{ route('delete.rating', $course_rating->id) }}">Delete Review</a>--}}
{{--                                            @endif--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" class= "form-control" id="name" placeholder="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Your Review</label>
                                    <textarea class="form-control form-control" placeholder="Comments" name="comments"></textarea>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-lg btn-block login-page-button">Review</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal end -->
    </div>

@endsection

@section('footer_scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {

    $("#rateYo").rateYo({
        @if($rating)
    @if($rating->id)
        rating: '{{ $rating->rating }}',
        @else
    @endif
        @endif
    halfStar: true,
    ratedFill: "#00a500",
    starWidth: "25px",
    onChange: function (rating, rateYoInstance) {
    $('#rating').val(rating);
    }
    });
    });
    </script>
@endsection

