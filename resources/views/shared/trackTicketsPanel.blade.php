@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a class="btn btn-info" style="float: right;" href="{{ route('viewTickets.index') }}"> Back</a>
<legend>#{{$ticket[0]->ticketId}} : {{$ticket[0]->subject}}</legend>





    <div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne"><i class="fa fa-pencil-square-o" aria-hidden="true"> Add Comment</i></a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
        <div class="panel-body">

            {!! Form::open(array('route' => 'viewTickets.store', 'method'=>'POST','class'=>'form-horizontal')) !!}


            <fieldset>
                <div class="form-group">
                    {!! Form::label('description', 'Description',['class'=>'col-lg-2 control-label']) !!}
                    <div class="col-lg-10">

                            {!! Form::textArea('description', '', ['class' => 'form-control']) !!}

                    </div>
                </div>
                <div class="form-group text-center">

                    <button class="btn btn-success" type="submit">Post</button>
                    {{--<a class="btn btn-primary" href="{{ route('viewTickets.store',$ticket[0]) }}">Post</a>--}}
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading ">
        <h3 class="panel-title "><i class="fa fa-info" aria-hidden="true"> Problem Description</i></h3>
    </div>
    <div class="panel-body">

        <p>{{$ticket[0]->description}}</p>

    </div>
</div>
@if(count($commentList)>0)
    @foreach($commentList as $comment)
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comment" aria-hidden="true"> # {{$comment->commentId}}</i></h3>
            </div>
            <div class="panel-body">
                <p><b><u>{{$comment->emailId}}</u></b></p>
                <p>{{$comment->description}}</p>
            </div>
        </div>
    @endforeach
@endif