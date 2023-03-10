<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnersController extends Controller
{
    public function createOwner()
    {
        return view('owner.create');
    }

    public function storeOwner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'birthday' => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            Owner::create([
                'name' => $request->name,
                'dob' => $request->birthday
            ]);

            return redirect()->to('/');
        }
    }

}
