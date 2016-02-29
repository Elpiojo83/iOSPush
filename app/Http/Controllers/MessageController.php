<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\App;

class MessageController extends Controller
{
	public function index()
	{
		$app = App::all();
		$message = Message::all();
    	return view('dashboard.messages', compact('message', 'app'));
	}
    
}
