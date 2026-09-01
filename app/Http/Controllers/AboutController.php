<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $stats = [
            (object) ['value' => '15+', 'label' => 'Years of Experience', 'icon' => 'M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'],
            (object) ['value' => '50,000+', 'label' => 'Parts in Stock', 'icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4'],
            (object) ['value' => '98.7%', 'label' => 'Customer Satisfaction', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            (object) ['value' => '24h', 'label' => 'UK Delivery', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
        ];

        $team = [
            (object) ['name' => 'Mike Thompson', 'role' => 'General Manager', 'bio' => 'Automotive industry veteran with 15 years experience. Leading Bank Seized Cars with a mission to provide quality repossessed vehicles at fair prices to Vermont and surrounding areas.', 'avatar' => 'https://i.pravatar.cc/200?u=10'],
            (object) ['name' => 'Sarah Mitchell', 'role' => 'Operations Director', 'bio' => 'Logistics expert ensuring our inventory is managed with precision. Every vehicle, every time.', 'avatar' => 'https://i.pravatar.cc/200?u=11'],
            (object) ['name' => 'James Cooper', 'role' => 'Lead Inspector', 'bio' => 'Master technician with 12 years of hands-on experience. James personally verifies all vehicle inspections.', 'avatar' => 'https://i.pravatar.cc/200?u=12'],
            (object) ['name' => 'Emily Rodriguez', 'role' => 'Customer Relations Manager', 'bio' => 'Dedicated to making sure every customer gets expert guidance and the right vehicle first time, every time.', 'avatar' => 'https://i.pravatar.cc/200?u=13'],
        ];

        return view('pages.about', compact('stats', 'team'));
    }
}
