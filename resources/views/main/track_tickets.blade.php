@extends('shared.master')
@section('title', 'Track Tickets | Ticket Raising System')

@section('content')
    <div class="container" style= "margin-top: 8%;">
        <div class="col-md-3 pull-md-left">
            @if(!Session::get('role') == 'admin')
                @include('shared.leftPanel')
                @else
                    @include('shared.ticketDetails_leftPanel_admin')
            @endif

        </div>
        <div class="col-md-9 col-lg-9 pull-md-right">
            @include('shared.trackTicketsPanel')
        </div>
    </div>
@endsection