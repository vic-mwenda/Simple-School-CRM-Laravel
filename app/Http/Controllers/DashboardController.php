<?php

namespace App\Http\Controllers;

use App\Models\inquiries;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource for our inquiries table.
     */
    public function index()
    {
        $inquiries = inquiries::with('customer', 'user')->paginate(3);

        return view('dashboard',compact('inquiries'));
    }
}
