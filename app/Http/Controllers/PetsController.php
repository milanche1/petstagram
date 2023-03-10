<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Image;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetsController extends Controller
{
    public function viewPet($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View {
        $pet = Pet::whereId($id)->first();

        abort_if(!$pet, 404);

        return view('pet.view', ['pet' => $pet]);
    }

    public function createPet(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
            'file' => 'required|image|mimes:jpeg,png,jpg,svg',
            'birthday' => 'required|date'
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
                'owner_id' => $request->owner,
                'dob' => $request->birthday
            ]);

            self::saveImage($request->avatar, $currentPet->id);

            return redirect()->to('/');
        }
    }

    private function saveImage($avatar, $petId): mixed
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
