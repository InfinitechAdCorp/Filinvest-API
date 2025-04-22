<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Property;
use App\Models\Appointment;
use App\Models\Inquiry;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function getCounts() {
        $properties = Property::count();
        $appointments = Appointment::count();
        $inquiries = Inquiry::count();
        $subscribers = Subscriber::count();

        $records = [
            'properties' => $properties,
            'appointments' => $appointments,
            'inquiries' => $inquiries,
            'subscribers' => $subscribers,
        ];

        $response = ['message' => "Fetched Counts", 'records' => $records];
        $code = 200;
        return response()->json($response, $code);
    }
}
