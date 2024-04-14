<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GettingStarted;
use App\Http\Requests\GettingStarted\GettingStartedRequest;

class GettingStartedController extends Controller
{
    public function index()
    {
        return GettingStarted::all();
    }
}
