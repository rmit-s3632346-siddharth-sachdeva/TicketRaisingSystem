<div class="table-container clearfix">
    <div id="tableTicketsList_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="listtable">
            <div id="tableTicketsList_filter" class="dataTables_filter">
                <label>
                    <input type="search" class="form-control input-sm" placeholder="Enter search term..." aria-controls="tableTicketsList">
                </label></div><div class="dataTables_info" id="tableTicketsList_info" role="status" aria-live="polite">Showing 1 to 10 of 28 entries
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
                    <td>{{ $ticket->priority}}</td>
                    <td>{{ $ticket->status}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {!! $ticketList->render() !!}
        </div>
    </div>
</div>