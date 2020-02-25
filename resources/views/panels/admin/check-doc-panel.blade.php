<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            {!! trans('TutorDisplay') !!}
            <div class="pull-right">
                <a href="{{ route('users') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {!! trans('usersmanagement.buttons.back-to-users') !!}
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
            <tr>

                <th scope="col">วันเวลาที่ร้องขอ</th>
                <th scope="col">ผู้ร้องขอ</th>
                <th scope="col">หลักฐาน</th>
                <th scope="col">ดำเนินการ</th>


            </tr>
            </thead>
            <tbody>
            @foreach($checkdoc as $checkdocs)
                <tr>
                    <td>{{$checkdocs->created_at}}</td>
                    <td>{{$checkdocs->user['name']}}</td>
                    <td><a  href="images/uploads/{{$checkdocs->image}} "    type="application/pdf" width="100%" height="600px"><img src="images/uploads/{{$checkdocs->image}}" alt="no image" width="100" height="100"></a></td>
                    <td>

                        @if($checkdocs->status==1)
                            <div class="alert alert-success" role="alert">
                                ยืนยันแล้ว
                            </div>
                        @elseif($checkdocs->status==2)
                            <div class="alert alert-danger" role="alert">
                                ยกเลิกแล้ว
                            </div>
                        @else
                            <form action="{{route('check-doc.update',$checkdocs->id)}}" method="POST">
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" name="user_id" value="{{$checkdocs->user_id}}">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">ยืนยัน</button>
                            </form>
                            <form action="{{route('check-doc.update',$checkdocs->id)}}" method="POST">
                                <input type="hidden" name="status" value="2">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">ยกเลิก</button>
                            </form>
                        @endif




                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
