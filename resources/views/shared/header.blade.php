<script src="js/raiseTicketCustomScript.js"></script>
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
                <li>
                    <a class="page-scroll navSection" href="#about">About</a>
                </li>
                <li>
                    <a class="page-scroll navSection" href="#services">Services</a>
                </li>
                <li id="login">
                    <a class="page-scroll navSection loginLink"  data-href="{{ URL::route('raiseTicket') }}"  >Login</a>
                </li>
                <li>
                    <a class="page-scroll navSection" href="#contact">Contact Us</a>
                </li>
                <li>
                    <a class="page-scroll navSection" href="{{URL::route('faqs')}}">FAQs</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>