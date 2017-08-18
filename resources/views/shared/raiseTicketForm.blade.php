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

        {{session()->put('success', '')}}

        {{--{!! Form::open(array('route' => 'raiseTicket_store', 'class' => 'form')) !!}--}}
        {!! Form::model($ticket, ['route' => 'raiseTicket_store']) !!}
        <fieldset>
            <legend>Ticket Details</legend>
            <div class="form-group">
                {!! Form::label('ticketId', 'Ticket ID',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('ticketId', $ticketId, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('emailId', 'Email Id',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::email('emailId', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phoneNo', 'Phone No.',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::number('phoneNo', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('firstName', 'First Name',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('firstName', '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('lastName', 'Last Name',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('lastName', '', ['class' => 'form-control']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('subject', 'Subject',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('subject', '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('operatingSystem', 'OS',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('operatingSystem', '', ['class' => 'form-control']) !!}
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
                    {!! Form::select('serviceArea', ['ITServices' =>'IT Services','WebServices'=>'Web services','BusinessSystem' => 'Business systems','ARG'=>'ARG'], 'WebServices', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('preferredContact', 'Contact Via',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::select('preferredContact', ['Email' => 'Email', 'Phone' => 'Phone'], 'Email', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('status', 'Pending', ['class' => 'form-control', 'readonly ']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::textArea('description', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('attachment', 'Attachments',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::file('attachment', '', ['class' => 'form-control']) !!}
                </div>
            </div>

            <div>
            <button class="btn btn-success" type="submit">Raise Ticket</button>
            </div>
        </fieldset>
        {!! Form::close() !!}