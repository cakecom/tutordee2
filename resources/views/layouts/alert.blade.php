{{--Example status
success
info
warning
danger--}}
@if(session("status","")!="")
    <div class="alert alert-{{session("status","")}}" role="alert">{{session("messages","")}}</div>
@endif