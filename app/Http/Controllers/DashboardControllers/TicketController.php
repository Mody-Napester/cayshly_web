<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return String
     */
    public function index(){
        // Check Authority
        if (!check_authority('index.ticket')){
            return redirect('/');
        }

        $data['resources'] = Ticket::paginate(config('vars.pagination'));
        return view('@dashboard.ticket.index', $data);
    }
}
