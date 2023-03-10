<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class MainController extends Controller
{
    public function index()
    {
        $allPets = Pet::paginate(9);
        return view('welcome', ['pets' => $allPets]);
    }

    public function viewPet($id)
    {
        $pet = Pet::whereId($id)->first();

        abort_if(!$pet, 404);

        return $pet;
    }


    public function about() {
        return view('about');
    }
}
