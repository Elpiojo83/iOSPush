<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Device;
use App\AppDevice;
use App\App;


class DeviceController extends Controller
{

	protected $fillable = ['devic_token', 'device_notes', 'is_test_device', 'app_id'];

    public function index()
    {
    	$app = App::all();
    	$device = Device::all();
    	$app_devices = AppDevice::all();
    	return view('dashboard.device', compact('device','app','app_devices'));
    }

    public function add(Request $request, App $app)
    {
    	$device = new Device;
    	$device->device_token = $request->device_token;
    	$device->device_notes = $request->device_notes;
    	$device->is_test_device = $request->is_test_device;
    	$device->save();

    	$lastDeviceId = $device->id;

    	$appDevice = new AppDevice;
    	$appDevice->app_id = $request->app_id;
    	$appDevice->device_id = $lastDeviceId;
    	$appDevice->save();

    	return back();
    }
}
