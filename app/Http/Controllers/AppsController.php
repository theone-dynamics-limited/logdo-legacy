<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    public function index(Request $request)
    {
        $apps = Auth::user()->apps;
        return view('apps.index', compact('apps'));
    }

    public function create(Request $request)
    {
        $apps = Auth::user()->apps;
        return view('apps.create', compact('apps'));
    }

    public function store(Request $request)
    {
        
    }

    public function show(Request $request, App $app)
    {
        
    }

    public function edit(Request $request, App $app)
    {
        
    }

    public function update(Request $request, App $app)
    {
        
    }

    public function destroy(Request $request, App $app)
    {
        
    }
}
