@extends('layouts.app')
@section('title', $ticket->title)
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
					<p> Ticket Title: {{ $ticket->title }} </p>
					<p> Ticket ID: #{{ $ticket->ticket_id }} || {{ $ticket->id }} </p>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="ticket-info">
                        <p>Message: {{ $ticket->message }}</p>
                        <p>Category: {{ $ticket->category->name }}</p>
                        <p>
                            @if ($ticket->status === 'Open')
                                Status: <span class="label label-success">{{ $ticket->status }}</span>
                            @else
                                Status: <span class="label label-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
						<p>Screenshot:</p>
						<img class="img-circle" style="width: 140px; height: 140px;" src="{{ URL::asset('storage/slike/'.$ticket->file_path) }}">
                    </div>
                </div>

            </div>
            <hr>
            @include('tickets.comments')
            <hr>
            @include('tickets.reply')
        </div>
    </div>
</div>
@endsection