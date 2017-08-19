


<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Recently Raised Tickets</h3>
    </div>
    <div class="panel-body">
        <ul class="list-group ">
            {{--    <li class="list-group-item ">
                    <span class="badge">14</span>
                    Cras justo odio
                </li>
                <li class="list-group-item">
                    <span class="badge">2</span>
                    Dapibus ac facilisis in
                </li>
                <li class="list-group-item">
                    <span class="badge">1</span>
                    Morbi leo risus
                </li>--}}
            @if(count($recentTickets)>0)
                @foreach($recentTickets as $ticket)
                    <li class="list-group-item">
                        {{ $ticket->ticketId}}

                    </li>
                @endforeach
            @else
                <li class="list-group-item">
                    No recent tickets
                </li>
            @endif


        </ul>
    </div>
</div>

