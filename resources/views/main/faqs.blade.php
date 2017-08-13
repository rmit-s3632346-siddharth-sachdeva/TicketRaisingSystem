@extends('shared.master')
@section('title', 'FAQs | Ticket Raising System')

@section('content')
    <div class="container" style= "margin-top: 8%;">

    <legend>FAQ</legend>
    <div class="container ">
        <div class="panel-group" id="faqAccordion">
            <div class="panel panel-default ">
                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                    <h4 class="panel-title">

                        <a href="#" class="ing">Q: Why do we use it?</a>
                    </h4>

                </div>
                <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <h5><span class="label label-primary">Answer</span></h5>

                        <p>Service and Support Centre is a one stop place for finding assistance for all Information Technology  queries. You can raise a ticket for reporting an issue or request a service in any of the service area. Not even that you have the power of tracking the progress of your ticket.</p>

                    </div>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
                    <h4 class="panel-title">
                        <a href="#" class="ing">Q: What are the our service areas?</a>
                    </h4>

                </div>
                <div id="question4" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <h5><span class="label label-primary">Answer</span></h5>

                        <p><b><u>We can be communicated via -</u></b></p>
                        <li>Financial and legal</li>
                        <li>Information Technology services</li>
                        <li>Web services</li>
                        <li>Business Systems</li>
                        <li>Stratergy and governance</li>

                    </div>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                    <h4 class="panel-title">
                        <a href="#" class="ing">Q: What are the ways of communication?</a>
                    </h4>

                </div>
                <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <h5><span class="label label-primary">Answer</span></h5>

                        <p><b><u>We can be communicated via -</u></b></p>
                        <li>For critical issues - Phone : 0399258888</li>
                        <li>For non-urgent request and queries - Service and support portal</li>
                        <li>Walk up to our walk-up support locations</li>
                    </div>
                </div>
            </div>

            <div class="panel panel-default ">
                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                    <h4 class="panel-title">
                        <a href="#" class="ing">Q: What are the hours of operation?</a>
                    </h4>

                </div>
                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <h5><span class="label label-primary">Answer</span></h5>


                        <p><b><u>From 31 January – 2 December 2017</u></b></p>

                        <li>Phone support</li>

                        <ol>Monday to Friday 8.00 am to 8.00 pm</ol>

                        <ol>Saturday 8.30 am to 4.30 pm</ol>

                        <li>Switchboard</li>

                        <ol>		Monday to Friday 8.30 am to 5.30 pm</ol>

                        <p><b><u>From 31 January - 14 December 2017</u></b></p>

                        <li>		AV loans</li>

                        <ol>		Monday to Friday – 9:00 am to 5:00 pm</ol>
                    </div>
                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                    <h4 class="panel-title">
                        <a href="#" class="ing">Q: What are the walk up support locations?</a>
                    </h4>

                </div>
                <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                    <div class="panel-body">
                        <h5><span class="label label-primary">Answer</span></h5>

                        <p><b><u>From 31 January - 2 December 2017</u></b></p>

                        <li>	Swanston Academic Building (SAB) – Building 80 Level 3 - Monday to Friday 8.00 am to 8.00 pm, Saturday 8.30 am to 4.30 pm</li>

                        <li>	Bundoora Library - Monday to Friday - 9.00 am to 5.00 pm</li>

                        <li>	Brunswick Library - Monday to Friday - 9.00 am to 5.00 pm</li>

                        <li>	Carlton Library - Monday to Friday - 11.00 am to 2.00 pm</li>

                        <li>	Swanston Library - Monday to Friday 10.00 am to 6.00 pm</li>
                    </div>
                </div>
            </div>


        </div>
        <!--/panel-group-->
    </div>
    </div>
    @endsection