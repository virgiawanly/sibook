<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(): \Illuminate\Contracts\View\View
    {
        return view('dashboard');
    }
}
