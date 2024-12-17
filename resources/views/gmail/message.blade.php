
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('profile') }}</div>

                <h1>Gmail Messages</h1>

                <h1>Messages</h1>

<ul>
    @foreach($historyRecords as $message)
        <li>
            {{ $message->snippet }}
           
        </li>
    @endforeach
</ul>

<h1>Message</h1>

<p>{{ $message->snippet }}</p>

<p>From: {{ $message->payload->headers[0]->value }}</p>

<p>Subject: {{ $message->payload->headers[1]->value }}</p>


 
 

<!-- Display the thread messages here -->
            </div>
        </div>
    </div>
</div>
@endsection
