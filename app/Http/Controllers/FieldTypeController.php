<?php

namespace App\Http\Controllers;

use App\Models\FieldType;

class FieldTypeController extends Controller
{
    public function index()
    {
        return FieldType::all();
    }
}
