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

                <th scope="col">GroupName
                    <a href="{{ route('group.index') }}" type="button" class="btn btn-primary">ADD</a>
                </th>
                <th scope="col">SubjectName
                    <a href="{{ route('subject.index') }}" type="button" class="btn btn-primary">ADD</a>

            </tr>
            </thead>
            <tbody>
            @foreach($Group as $Groups)
                <tr>

                    <td>{{$Groups->group_name}}</td>
                    <td>

                    @foreach($Groups->subject as $Subject)

                        <?php echo  $Subject->subject_name.'<br>' ?>

                    @endforeach
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
