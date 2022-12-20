@extends('emails.layouts.master')

@section('content')

<h3>{{ $details['title'] }}</h3>
<p>{{ $details['body'] }}</p>

@endsection
