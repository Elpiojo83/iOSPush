<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MessageQueue;
use App\Message;
use App\Device;


class MessageQueueController extends Controller
{
    public function proceedMessageQueue(Request $request)
    {
    		
			// Put your private key's passphrase here:
			$passphrase = 'vmk_dev';
			////////////////////////////////////////////////////////////////////////////////

			$ctx = stream_context_create();
			stream_context_set_option($ctx, 'ssl', 'local_cert', 'uploads/certificates/vmk.pem');
			stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);


			// Open a connection to the APNS server


			if($request->server_type_id == 1)
			{
				$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
				$devices = Device::where('is_test_device', 1)->get();
			}
			else
			{
				$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
				$devices = Device::all();
			}


			if (!$fp)
				exit("Failed to connect: $err $errstr" . PHP_EOL);

			echo 'Connected to APNS' . PHP_EOL;


			$message_queue = MessageQueue::where('status', 1)->get();

			// Create the payload body
			foreach ($message_queue as $message) {
				# code...
				$body['aps'] = array(
					'alert' => $message->message,
					'badge' => 1,
					'sound' => 'default'
				);
			}
			

			// Encode the payload as JSON
			$payload = json_encode($body);

			// Build the binary notification


			// Send it to the server

			foreach ($message_queue as $message) {
		    	$msg = chr(0) . pack('n', 32) . pack('H*', $message->device_token) . pack('n', strlen($payload)) . $payload;
				$result = fwrite($fp, $msg, strlen($msg));
				MessageQueue::where('id', $message->id)->update(['status' => 2]);
				Message::where('id', $message->id)->update(['status' => 2]);
		    }

			if (!$result)
				echo 'Message not delivered' . PHP_EOL;
				
			else
				echo 'Message successfully delivered' . PHP_EOL;

			// Close the connection to the server
			fclose($fp);

			return back();
    }
}
