@extends('shared.master')
@section('title', 'Raise Ticket | Ticket Raising System')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ticket Details</h2>
                </div>
            </div>
        </div>
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
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        {!! Form::model($ticket, ['action' => 'RaiseTicketController@create'],['class' =>'form-horizontal']) !!}
        <div class="form-group">
            {!! Form::label('ticketIdLabel', 'Ticket ID',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('ticketIdInput', '', ['class' => 'form-control'],array('disabled')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('userIdLabel', 'User ID',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('userIdInput', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('nameLabel', 'Name',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('nameInput', '', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('subjectLabel', 'Subject',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('subjectInput', '', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('priorityLabel', 'Priority',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('prioritySelect', ['H' => 'High', 'M' => 'Medium', 'L' => 'Low'], 'M',['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('serviceAreaLabel', 'Service Area',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('serviceAreaSelect', ['ITServices' =>'IT Services','WebServices'=>'Web services','BusinessSystem' => 'Business systems','ARG'=>'ARG'], '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preferredContactLabel', 'Preferred Contact',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('preferredContactSelect', ['Email' => 'Email', 'Phone' => 'Phone'], '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('operatingSystemLabel', 'Operating System',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('operatingSystemInput', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('issueDescriptionLabel', 'Issue Description',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::textarea('issueDescriptionTextArea', '', ['class' => 'form-control']) !!}
            </div>
        </div>

        <button class="btn btn-success" type="submit">Raise Ticket</button>

        {!! Form::close() !!}

    </div>
@endsection
