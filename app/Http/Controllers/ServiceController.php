<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    public function create()
    {
        $data = \request()->validate([
            'name' => 'required'
        ]);

        Service::create($data);

        return redirect()->back();
    }
}
