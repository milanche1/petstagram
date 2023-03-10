<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Image;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        $allPets = Pet::get();
        return view('welcome', ['pets' => $allPets]);
    }

    public function viewPet($id)
    {
        $pet = Pet::whereId($id)->first();

        abort_if(!$pet, 404);

        return $pet;
    }

    public function createPet()
    {
        $owners = Owner::all();

        $owners = $owners->isEmpty() ? null : $owners;

        return view('pet.create', ['owners' => $owners]);
    }

    public function storePet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:150',
            'owner' => 'required',
            'avatar' => 'required|image'
        ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $currentPet = Pet::create([
                'name' => $request->name,
                'description' => $request->description,
                'owner_id' => 1,
                'dob' => '2022-1-1'
            ]);

            self::saveImage($request->avatar, $currentPet->id);

            return redirect()->to('/');
        }
    }

    private function saveImage($avatar, $petId)
    {
        $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
        $avatar->move(public_path('avatars'), $avatarName);

        $saveAvatar = Image::create([
            'name' => $avatarName,
            'pet_id' => $petId
        ]);

        return $saveAvatar->id;
    }
}
