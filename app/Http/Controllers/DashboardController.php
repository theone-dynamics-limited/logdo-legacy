<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $total_info = 0;
        $total_errors = 0;
        $total_warnings = 0;

        $apps = Auth::user()->currentTeam->apps;

        foreach($apps as $app){
            $total_info += $app->logs()->sum('info_count');
            $total_errors += $app->logs()->sum('error_count');
            $total_warnings += $app->logs()->sum('warning_count');
        }

        return view('dashboard',  compact('apps', 'total_info', 'total_errors', 'total_warnings'));
    }
}
