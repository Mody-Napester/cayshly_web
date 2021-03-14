<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\Point;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of points.
     */
    public function points()
    {
        $data['resources'] = Point::all();
        return view('@dashboard.report.points.index', $data);
    }
}
