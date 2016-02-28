<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Server;

class ServerController extends Controller
{
	protected $fillable = ['server_title', 'server_url', 'server_type_id'];

    public function index(Request $request)
    {
    	$server = Server::all();
    	return view('dashboard.settings.server', compact('server'));
    }

    public function add(Request $request, Server $server)
    {
    	$server = new Server;
    	$server->server_title = $request->server_title;
    	$server->server_url = $request->server_url;
    	$server->server_type_id = $request->server_type_id;
    	$server->save();
    	return back();
    }
}
