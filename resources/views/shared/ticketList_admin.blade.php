@if (count($errors) > 0)
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="table-container clearfix">
    <div id="tableTicketsList_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="listtable">
            <div id="tableTicketsList_filter" class="dataTables_filter">
                <label>
                    
                    {!! Form::open(['action' =>'ViewTicketsController@search','method'=>'PATCH' ,'style'=>'display:inline']) !!}
                {!! Form::text('search', '', ['class' => 'form-control', 'style'=>'color: black;']) !!}

                {!! Form::submit('Search', ['class' => 'btn btn-warning btn-sm searchBtn']) !!}
                {!! Form::close() !!}
                </label>
            </div>
            <div class="dataTables_info" id="tableTicketsList_info" role="status" aria-live="polite">Showing 1 to 7
                of {{$ticketList->total()}} entries
            </div>
            <table class="table table-striped table-hover table-list dataTable no-footer dtr-inline">
                <thead>
                <tr>
                    <th>Ticket Id</th>
                    <th>Subject</th>
                    <th>Service Area</th>
                    <th>Priority</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ticketList as $ticket)
                    <tr class="active">
                        <td>{{ $ticket->ticketId}}</td>
                        <td>{{ $ticket->subject}}</td>
                        <td>{{ $ticket->serviceArea}}</td>
                        <td>
                            @if($ticket->priority == 'H')
                                High
                            @elseif($ticket->priority == 'M')
                                Medium
                            @else
                                Low
                            @endif
                        </td>
                        <td>{{ $ticket->status}}</td>
                        <td><a class="btn btn-info" href="{{ route('viewTickets.show',$ticket->ticketId) }}">Show</a>
                        </td>

                        {{--
                                            @if($isEditable != true)

                                                <td>
                                                    {!! Form::open(array('route' => 'setEditable','style'=>'display:inline')) !!}
                                                    {{ Form::hidden('ticketObject', $ticket) }}
                                                    {!! Form::submit('Edit', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}


                                                </td>

                                            @else

                                                <td>

                                                    {!! Form::open(array('route' => 'performUpdate','style'=>'display:inline')) !!}
                                                    {!! Form::submit('Done', ['class' => 'btn btn-danger']) !!}</td>
                                                {!! Form::close() !!}

                                                </td>



                                            @endif--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $ticketList->render() !!}
        </div>
    </div>
</div>