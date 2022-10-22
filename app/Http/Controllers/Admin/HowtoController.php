<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HowtoController extends Controller
{
    public function index(Request $request)
    {
        return view('howto.index');
    }
}

