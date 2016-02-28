<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\App;

class AppController extends Controller
{
    protected $fillable = ['app_name', 'app_identifier'];

    public function index(Request $request)
    {
    	$app = App::all();
    	return view('dashboard.settings.app', compact('app'));
    }

    public function add(Request $request, App $app)
    {
    	$app = new App;
    	$app->app_name = $request->app_name;
    	$app->app_identifier = $request->app_identifier;
    	$app->save();
    	return back();
    }
}
