<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\ConferenceHall;

class ServiceController extends Controller
{
    public function index()
    {
        $halls = ConferenceHall::all();
        return view('services.index', compact('halls'));
    }

    public function checkAvailability(Request $request)
    {
        $hallId = $request->conference_hall_id;
        $limit = (int) ($request->limit ?? 10);
        $page  = (int) ($request->page ?? 1);

        if ($page < 1) {
            $page = 1;
        }
        $totalDays = 15;
        $totalPages = (int) ceil($totalDays / $limit);

        if ($page > $totalPages) {
            $page = $totalPages;
        }

        $offset = ($page - 1) * $limit;

        $dates = collect();
        for ($i = 0; $i < $limit; $i++) {
            $dayIndex = $offset + $i;

            if ($dayIndex >= $totalDays) {
                break;
            }

            $dates->push(
                now()->addDays($dayIndex)->toDateString()
            );
        }

        $bookedSlots = Booking::where('conference_hall_id', $hallId)
            ->whereIn('booking_date', $dates)
            ->get();

        $hallName = ConferenceHall::findOrFail($hallId)->name;

        $start = $offset + 1;
        $end   = min($offset + $limit, $totalDays);

        return view('services.grid', compact(
            'dates',
            'bookedSlots',
            'hallName',
            'hallId',
            'limit',
            'page',
            'totalPages',
            'start',
            'end',
            'totalDays'
        ));
    }
}
