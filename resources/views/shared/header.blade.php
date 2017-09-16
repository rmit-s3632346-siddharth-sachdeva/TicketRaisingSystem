<meta name="csrf-token" content="{{ csrf_token() }}">
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
                @if(!Auth::guest())
                    <li id="viewTickets">
                        <a class="page-scroll navSection" href="{{URL::route('viewTickets.index')}}"  >View Tickets</a>
                    </li>
                    <li>
                        <a class="page-scroll navSection" href="{{URL::route('raiseTicket')}}">Raise Ticket</a>
                    </li>
                @endif
                @if(\Request::is('/') || \Request::is('/home'))
                    <li>
                        <a class="page-scroll navSection" href="#contactUs">Contact Us</a>
                    </li>
                @endif
                <li>
                    <a class="page-scroll navSection" href="{{URL::route('faqs')}}">FAQs</a>
                </li>
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->firstName }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
{{--
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
</div>--}}
