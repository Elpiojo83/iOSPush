<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Device;

class DashboardController extends Controller
{
    public function index()
    {

    	return view('dashboard.index');
    }
}
