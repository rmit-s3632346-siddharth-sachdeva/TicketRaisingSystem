
    <legend>View Ticket #TicketId</legend>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-comment">
                            </span>Add Comment</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse ">
            <div class="panel-body">
                {!! Form::model($comment, ['route' => 'trackTicketComment_store']) !!}
                <fieldset>
                <div class="form-group">
                    <label for="description" class="col-lg-2 control-label">Comment</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="description"></textarea>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 5%">
                    <label for="inputAttachments" class="col-lg-2 control-label">Attachments</label>
                    <div class="col-lg-10">
                        <input type="file" name="attachments[]" id="inputAttachments" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Post</button>
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
            @foreach($problemDescription as $description)
                <p>{{$description}}</p>
            @endforeach
        </div>
    </div>
    @if(count($commentList)>0)
        @foreach($commentList as $comment)
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$comment->commentId}}</h3>
                </div>
                <div class="panel-body">
                    <h1>{{$comment->emailId}}</h1>
                    <p>{{$comment->description}}</p>
                </div>
            </div>
        @endforeach
    @endif