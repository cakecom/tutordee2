@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">

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
                        <form action="{{route('group.store')}}" method="POST">
                            @method('POST')
                            @csrf
                        <table class="table ">

                        <tr>
                            <td>

                            <div class="form-group">

                                <input type="text" class="form-control" name="groupName" placeholder="Add Group Name">
                            </div>

                            </td>
                            <td>
                                <button  type="submit" class="btn btn-success">ADD</button>
                            </td>
                        </tr>

                        </table>
                        </form>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>

                                <th scope="col">GroupName</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Group as $Groups)
                                <tr>

                                    <td>{{$Groups->group_name}}</td>
                                    <td>
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-warning btn-icon-split" id="editButton" data-toggle="modal" data-name="{{$Groups->group_name}}"  data-id="{{$Groups->id}}" data-target="#edit">
                                                <span class="text">Edit</span>
                                            </button>
                                        </td>
                                    <td> <form action="{{ route('group.destroy', $Groups->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-icon-split">
                                                <span class="text">Delete</span>
                                            </button>
                                        </form></td>

                                </tr>



                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('group.update','update') }}" method="POST">
                    @method('PATCH')
                    @csrf
                <div class="modal-body">

                        <input id="groupOld" name="groupName" type="text" value="">
                    <input id="groupID" type="hidden" name="groupID" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).on("click", "#editButton", function () {
            var groupID = $(this).data('id');
            var groupName = $(this).data('name');
            $("#groupOld").val( groupName );
            $("#groupID").val( groupID );
            // As pointed out in comments,
            // it is unnecessary to have to manually call the modal.
            // $('#addBookDialog').modal('show');
        });
    </script>
@endsection
