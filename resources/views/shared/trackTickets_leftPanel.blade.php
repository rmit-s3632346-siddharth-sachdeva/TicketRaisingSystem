
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr class="info">
                    <th> <i class="fa fa-info-circle" aria-hidden="true"> Ticket Information</i></th>

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td> <b> <u>Subject: </u></b></br>   {{$ticket[0]->subject}}   </td>
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
                @if(Session::get('role') == 'admin')
                <tr>
                    {!! Form::open(['route' => ['viewTickets.edit',$ticket[0]->ticketId],'method'=> 'GET' ,'class' => 'form-horizontal']) !!}
                    {{--{!! Form::open(['method' => 'DELETE','route' => ['productCRUD.destroy', $product->id],'style'=>'display:inline']) !!}--}}
                    <td>{{Form::select('status', ['Pending' => 'Pending', 'In Progress' => 'In Progress', 'Unresolved'=>'Unresolved', 'Resolved' => 'Resolved','Closed'=>'Closed'], $ticket[0]->status,['class' => 'form-control'])}}</td>

                </tr>
                <tr>

                    <td><button class="btn btn-success" type="submit">Update Status</button></td>
                    {!! Form::close() !!}
                </tr>
                @else
                    <tr>
                        <td><b> <u>Status:</u></b></br>  {{$ticket[0]->status}} </td>

                    </tr>
                    @endif

                </tbody>
            </table>


