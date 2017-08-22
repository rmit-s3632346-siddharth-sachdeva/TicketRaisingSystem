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


                </label></div>
            <div class="dataTables_info" id="tableTicketsList_info" role="status" aria-live="polite">Showing {{$ticketList->count()}}
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
                        {{--<td><a class="btn btn-primary" href="--}}{{--{{ route('productCRUD.edit',$product->id) }}--}}{{--">Edit</a></td>--}}


                        @if($ticket->status == 'Closed')
                            <td>  {!! Form::open(['method' => 'PATCH','route' => ['viewTickets.update', $ticket->ticketId ],'style'=>'display:inline']) !!}
                                {!! Form::submit('Re-open Ticket', ['class' => 'btn btn-danger']) !!}</td>
                            {!! Form::close() !!}
                            {{--<td><a class="btn btn-danger" disabled --}}{{--href="{{ route('viewTickets.update', $ticket) }}"--}}{{-->Ticket Closed</a></td>--}}
                        @else

                            <td>
                                {!! Form::open(['method' => 'PATCH','route' => ['viewTickets.update', $ticket->ticketId ],'style'=>'display:inline']) !!}

                                {!! Form::submit('Close Ticket', ['class' => 'btn btn-success']) !!}</td>

                            {!! Form::close() !!}


                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $ticketList->render() !!}
        </div>
    </div>
</div>