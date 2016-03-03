<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\App;
use App\MessageQueue;
use App\AppDevice;
use App\Device;

class MessageController extends Controller
{

	protected $fillable = ['mesage', 'app_identifier', 'app_id'];

	public function index()
	{
		$app = App::all();
		$message = Message::all();
		$message_queue = MessageQueue::all();
    	return view('dashboard.messages', compact('message', 'app', 'message_queue'));
	}

	public function add(Request $request, Message $message, MessageQueue $message_queue, Device $device)
	{
		
		$message = new Message;
		$message->message = $request->message;
		$message->save();
    	

    	$selectedDevice = AppDevice::where('app_id', $request->app_id)->get();

    	$DeviceToken = AppDevice::where('app_id', $request->app_id)->get();

    	foreach ($selectedDevice as $device) {
    		$message_queue = new MessageQueue;
    		$message_queue->certificate_id = '1';
    		$message_queue->device_id = $device->device_id;
    		$device_token = Device::where('id', $message_queue->device_id)->value('device_token');
    		$message_queue->device_token = $device_token;
    		$message_queue->message = $request->message;
    		$message_queue->badge = '1';
    		$message_queue->sound = 'default';
    		$message_queue->status = '1';
    		$message_queue->save();
    	}
  
		return back();
	}
    
}
