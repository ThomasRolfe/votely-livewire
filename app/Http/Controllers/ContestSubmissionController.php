<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ContestSubmissionController extends Controller
{
    public function index(Request $request, Contest $contest)
    {
        //$contest->load()
    }
}
