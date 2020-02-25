<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            {!! trans('CreateGroup') !!}
            <div class="pull-right">
                <a href="{{ route('users') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('usersmanagement.tooltips.back-users') }}">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    {!! trans('usersmanagement.buttons.back-to-users') !!}
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">GroupName</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter GroupName">

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>
