
            <table class="table table-striped table-hover">
                <thead>
                <tr class="info">
                    <th>Ticket Information</th>

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td> <b> <u> {{$ticket[0]->subject}} </u></b>  </td>
                </tr>
                <tr>
                    <td><b> <u>Service Area:</u></b> </br>  {{$ticket[0]->serviceArea}}</td>
                </tr>
                <tr>
                    <td><b> <u>Raised by:</u></b> </br>  {{$ticket[0]->emailId}}</td>
                </tr>
                <tr>
                    <td> <b> <u> Raised on: </u></b> </br> {{$ticket[0]->created_at}}</td>
                </tr>
                <tr>
                    <td><b> <u>Last modified:</u></b> </br>  {{$ticket[0]->updated_at}}</td>
                </tr>
                <tr>
                    <td><b> <u>Priority:</u></b> </br>

                        @if($ticket[0]->priority == 'H')
                            High <span style="color: red; font-weight: bolder">  !!! </span>
                        @elseif(($ticket[0]->priority == 'M'))
                            Medium <span style="color: goldenrod; font-weight: bolder">  !! </span>
                        @else
                            Low <span style="color: red; font-weight: bolder">  ! </span>
                         @endif


                    </td>
                </tr>
                <tr>
                    {!! Form::open(['route' => ['viewTickets.edit',$ticket[0]->ticketId],'method'=> 'GET' ,'class' => 'form-horizontal']) !!}
                    {{--{!! Form::open(['method' => 'DELETE','route' => ['productCRUD.destroy', $product->id],'style'=>'display:inline']) !!}--}}
                    <td>{{Form::select('status', ['Pending' => 'Pending', 'In Progress' => 'In Progress', 'Unresolved'=>'Unresolved', 'Resolved' => 'Resolved','Closed'=>'Closed'], $ticket[0]->status,['class' => 'form-control'])}}</td>

                </tr>
                <tr>

                    <td><button class="btn btn-success" type="submit">Update Status</button></td>
                    {!! Form::close() !!}
                </tr>
                </tbody>
            </table>


