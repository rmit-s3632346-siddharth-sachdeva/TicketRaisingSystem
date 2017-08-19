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

    <legend> #{{$ticket[0]->ticketId}} : {{$ticket[0]->subject}}</legend>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne"><span class="glyphicon glyphicon-comment">
                            </span>Add Comment</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse ">
            <div class="panel-body">

                {!! Form::open(array('route' => 'viewTickets.store', 'method'=>'POST')) !!}


                <fieldset>
                    <div class="form-group">
                        {!! Form::label('description', 'Description',['class'=>'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            @if(Session::get('role') == 'admin')
                            {!! Form::textArea('description', '




----------------------------------
Regards,
Administrator | RMIT Support & Service
RMIT University - Success begins here
M: +61 411 333 222
E: admin@rmit.edu.au', ['class' => 'form-control']) !!}
                                @else
                            {!! Form::textArea('description', '', ['class' => 'form-control']) !!}
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('attachment', 'Attachments',['class'=>'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::file('attachment', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                <div class="form-group">

                    <button class="btn btn-success" type="submit">Post</button>
                    {{--<a class="btn btn-primary" href="{{ route('viewTickets.store',$ticket[0]) }}">Post</a>--}}
                </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">Problem Description</h3>
        </div>
        <div class="panel-body">

                <p>{{$ticket[0]->description}}</p>

        </div>
    </div>
    @if(count($commentList)>0)
        @foreach($commentList as $comment)
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$comment->commentId}}</h3>
                </div>
                <div class="panel-body">
                    <p><b><u>{{$comment->emailId}}</u></b></p>
                    <p>{{$comment->description}}</p>
                </div>
            </div>
        @endforeach
    @endif