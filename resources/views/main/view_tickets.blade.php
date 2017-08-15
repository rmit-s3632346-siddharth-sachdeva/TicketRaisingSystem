@extends('shared.master')
@section('title', 'View Tickets | Ticket Raising System')
@section('content')
    <div class="container" style= "margin-top: 8%;">
        <div class="col-md-3 pull-md-left">
            @include('shared.leftPanel')
        </div>
        <div class="col-md-9 col-lg-9 pull-md-right">
            @include('shared.ticketList')
        </div>
    </div>
@endsection

