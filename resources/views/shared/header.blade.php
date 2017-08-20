<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll navSection" href="{{URL::route('home')}}" >Ticket Raising System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                @if(\Request::is('/') || \Request::is('home') )
                    <li>
                        <a class="page-scroll navsection" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll navSection" href="#services">Services</a>
                    </li>
                @endif
                <li id="viewTickets">
                    <a class="page-scroll navSection viewTicketLink" data-target="#getEmailIdModal" data-toggle="modal"  >View Tickets</a>
                </li>
                <li>
                    <a class="page-scroll navSection" href="{{URL::route('raiseTicket')}}">Raise Ticket</a>
                </li>
                @if(\Request::is('/') || \Request::is('/home'))
                    <li>
                        <a class="page-scroll navSection" href="#contact">Contact Us</a>
                    </li>
                @endif
                <li>
                    <a class="page-scroll navSection" href="{{URL::route('faqs')}}">FAQs</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div id="getEmailIdModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Email Id:</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('route' => 'login_store', 'class' => 'form-horizontal')) !!}
                <fieldset>
                    <div class="form-group">
                        {!! Form::label('emailId', 'Email Id',['class'=>'col-lg-2 control-label']) !!}
                        <div class="col-lg-10">
                            {!! Form::email('emailId', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success text-center center-block">Login</button>
                </fieldset>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>