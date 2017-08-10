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
            {!! Form::label('name', 'Ticket ID',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', '', ['class' => 'form-control'],array('disabled')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'User ID',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Name',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', '', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('model', 'Subject',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('model', '', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('priority', 'Priority',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('priority', ['H' => 'High', 'M' => 'Medium', 'L' => 'Low'], 'M',['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('serviceArea', 'Service Area',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('serviceArea', ['ITServices' =>'IT Services','WebServices'=>'Web services','BusinessSystem' => 'Business systems','ARG'=>'ARG'], '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('preferredContact', 'Preferred Contact',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::select('preferredContact', ['Email' => 'Email', 'Phone' => 'Phone'], '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('operatingSystem', 'Operating System',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('operatingSystem', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('issueDescription', 'Issue Description',['class'=>'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('issueDescription', '', ['class' => 'form-control']) !!}
            </div>
        </div>

        <button class="btn btn-success" type="submit">Raise Ticket</button>

        {!! Form::close() !!}

    </div>
@endsection
