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
                <div class="card-header">
                    <h2>รีวิวจากลูกค้า</h2>
                </div>
                    <div class="card-body">
                        @foreach($reviews as $review)
                            <h3>{{$review->name}}</h3>
                            <p>{{$review->comments}}</p>
                            @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
