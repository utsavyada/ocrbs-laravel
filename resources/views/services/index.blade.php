@extends('layouts.app')

@section('content')
<h2 class="page-title">
    Check Availability of <br>
    Conference hall for next <br>
    15 days
</h2>
<form method="GET" action="{{ route('services.grid') }}" class="service-form">
    <select name="conference_hall_id" required>
        <option value="">Choose Conference Hall</option>
        @foreach($halls as $hall)
        <option value="{{ $hall->id }}">{{ $hall->name }}</option>
        @endforeach
    </select>

    <input type="hidden" name="limit" value="10">

    <br><br>
    <button type="submit">+ Submit</button>
</form>
@endsection
