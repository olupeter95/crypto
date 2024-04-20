<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LicenseKey;

class LicenseKeysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $page_name      = 'License Keys';
        $license_keys   = LicenseKey::all();

        return view('admin.license-keys', compact('page_name', 'license_keys'));
    }

    public function create(Request $request)
    {
        LicenseKey::create([
            'license_key' 		=> uniqid(),
			'status'			=> 'NOT USED',
        ]);

        return json_encode([
            'success' => 'true'
        ]);
    }
}
