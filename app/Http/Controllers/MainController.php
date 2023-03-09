<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $allPets = Pet::get();
        return view('welcome', ['pets' => $allPets]);
    }
}
