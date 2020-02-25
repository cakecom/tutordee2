<div class="card">
    <div class="card-header">
        <h1>บริการ</h1>
    </div>
    <hr>
    <div class="card-body">
            @foreach($group as $groups)
                <h2>{{$groups->group_name}}</h2>
                <hr>
        <div class="row">
            @foreach($groups->subject as $Subject)

                <div class="col-sm-6 col-md-4 h4" style="margin-bottom: 10px">
                <a href="{{url("service/".$Subject->id)}}"><p>{{$Subject->subject_name}}</p></a>
                </div>
            @endforeach

        </div>
            <hr>
                @endforeach
    </div>
</div>
