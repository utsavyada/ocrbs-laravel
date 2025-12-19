@extends('layouts.app')

@section('content')

<div class="booking-title">
    <div class="title-big">TOTAL BOOKING – {{ $hallName }}</div>
    <div class="title-small">Total Booking – {{ $hallName }}</div>
</div>

<form method="GET" action="{{ route('services.grid') }}" class="entries-bar">
    <input type="hidden" name="conference_hall_id" value="{{ $hallId }}">

    Show
    <select name="limit" onchange="this.form.submit()">
        <option value="5" {{ $limit==5  ? 'selected' : '' }}>5</option>
        <option value="10" {{ $limit==10 ? 'selected' : '' }}>10</option>
        <option value="15" {{ $limit==15 ? 'selected' : '' }}>15</option>
    </select>
    entries
</form>
<table class="slot-table">
    <thead>
        <tr>
            <th></th>
            @for ($time = strtotime("09:30"); $time <= strtotime("18:00"); $time +=1800) <th>{{ date("H:i", $time) }}</th>
                @endfor
        </tr>
    </thead>

    <tbody>
        @foreach($dates as $date)
        <tr>
            <td>{{ $date }}</td>

            @for ($time = strtotime("09:30"); $time <= strtotime("18:00"); $time +=1800) @php $slotStart=date("H:i:s", $time); $isBooked=$bookedSlots->contains(fn($b) =>
                $b->booking_date == $date && $b->start_time == $slotStart
                );
                @endphp

                <td class="{{ $isBooked ? 'slot-booked' : 'slot-available' }}"></td>
                @endfor
        </tr>
        @endforeach
    </tbody>
</table>

<div class="grid-footer">
    <div class="footer-left">
        Showing {{ $start }} to {{ $end }} of {{ $totalDays }} entries
    </div>

    <div class="footer-right">
        <a class="page-link" href="{{ route('services.grid', [
            'conference_hall_id'=>$hallId,
            'limit'=>$limit,
            'page'=>1
        ]) }}">First</a>

        <a class="page-link {{ $page==1 ? 'disabled' : '' }}" href="{{ route('services.grid', [
            'conference_hall_id'=>$hallId,
            'limit'=>$limit,
            'page'=>max(1,$page-1)
        ]) }}">Previous</a>

        @for ($p = 1; $p <= $totalPages; $p++) <a class="page-link {{ $p==$page ? 'active' : '' }}" href="{{ route('services.grid', [
                'conference_hall_id'=>$hallId,
                'limit'=>$limit,
                'page'=>$p
            ]) }}">
            {{ $p }}
            </a>
            @endfor

            <a class="page-link {{ $page==$totalPages ? 'disabled' : '' }}" href="{{ route('services.grid', [
            'conference_hall_id'=>$hallId,
            'limit'=>$limit,
            'page'=>min($totalPages,$page+1)
        ]) }}">Next</a>

            <a class="page-link" href="{{ route('services.grid', [
            'conference_hall_id'=>$hallId,
            'limit'=>$limit,
            'page'=>$totalPages
        ]) }}">Last</a>
    </div>
</div>

<div class="bottom-bar">
    <div class="bottom-left">Online Conference Booking System</div>
    <div class="bottom-right">
        <a href="/" class="home-link">Return to Home Page</a>
    </div>
</div>
@endsection
