<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // Return view tickets tanpa data, karena semua data ada di HTML
        return view('ticket.index');
    }
}