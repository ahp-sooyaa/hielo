<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Report;

class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.reports.index', [
            'reports' => Report::latest()->get()
        ]);
    }
}
