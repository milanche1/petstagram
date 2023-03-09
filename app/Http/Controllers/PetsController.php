<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function index() {
        $pets = [1, 2, 3];
        return view('welcome', ['pets' => $pets]);
    }
}
