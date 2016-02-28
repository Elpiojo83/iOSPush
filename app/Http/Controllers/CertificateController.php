<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Certificate;
use App\App;

class CertificateController extends Controller
{
    protected $fillable = ['certificate_name', 'certificate_passphrase', 'certificate_type_id', 'app_id', 'certificate_file'];

    public function index(Request $request, App $app)
    {
    	$certificate = Certificate::all();
    	$app = App::all();
    	return view('dashboard.settings.certificate', compact('certificate', 'app'));
    }

    public function add(Request $request, Certificate $certificate)
    {
    	if ($request->hasFile('certificate_file')) {
			$destinationPath = 'uploads/certificates';
    		$file = $request->certificate_file;
			$file->move($destinationPath, $request->file('certificate_file')->getClientOriginalName());
		}


		$file_name = $request->file('certificate_file')->getClientOriginalName();
		
    	$certificate = new Certificate;
		$certificate->certificate_file_name = $file_name;
    	$certificate->certificate_name = $request->certificate_name;
    	$certificate->certificate_passphrase = $request->certificate_passphrase;
    	$certificate->certificate_type_id = $request->certificate_type_id;
    	$certificate->app_id = $request->app_id;

    	$certificate->save();
    	return back();
    }

    public function upload($file)
    {

    }
}
