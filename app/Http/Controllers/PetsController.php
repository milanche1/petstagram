<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetsController extends Controller
{
    public function view($id) {
        $pet = Pet::whereId($id)->first();

        abort_if(!$pet, 404);

        return $pet;
    }

    public function create() {


        Pet::create([
            'name' => 'Mi',
            'owner_id' => 1,
            'dob' => '2022-1-1'
        ]);
    }
}
