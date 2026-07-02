<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Model ko import karna na bhulein

class BookingController extends Controller
{
    // User side se booking save karne ke liye (Pehle se hoga)
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'total_person' => 'required|integer',
        ]);

        Booking::create($request->all());
        return back()->with('success', 'Table Booked Successfully!');
    }

    // --- YE WALA METHOD MISSING THA ---
    public function adminIndex() 
    {
        // Saari bookings ko fetch karna
        $bookings = Booking::orderBy('id', 'desc')->get();
        
        // admin/bookings.blade.php file ko load karna
        return view('admin.booking', compact('bookings'));
    }

    // Status update karne ke liye (Confirm/Cancel buttons ke liye)
    public function updateStatus(Request $request, $id) 
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->status]);
        return back()->with('success', 'Status Updated Successfully!');
    }
}