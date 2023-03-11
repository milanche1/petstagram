<?php

namespace App\Http\Controllers\API;

use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function pets()
    {
        $allPets = Pet::all();

        if ($allPets->isEmpty()) {
            return 'no pets found';
        }

        return response()->json($allPets);
    }

    public function pet($id)
    {
        $pet = Pet::whereId($id)->first();


        if ($pet == null) {
            return 'no pet with this id!';
        }

        return response()->json($pet);
    }


    public function owners()
    {
        $allOwners = Owner::all();

        if ($allOwners->isEmpty()) {
            return 'no owners found';
        }

        return response()->json($allOwners);
    }

    public function owner($id)
    {
        $owner = Owner::whereId($id)->first();


        if ($owner == null) {
            return 'no owner with this id!';
        }

        return response()->json($owner);
    }

    public function ownerStore(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'dob' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        }

        try {

            $response = [
                'name' => $payload['name'],
                'dob' => $payload['dob'],
            ];

            Owner::create($response);

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {

            $errorResJson = $e
                ->getResponse()
                ->getBody()
                ->getContents();

            $errorRes = json_decode(stripslashes($errorResJson), true);

            return response()->json(
                [
                    'message' => 'error',
                    'data' => $errorRes
                ],
                $errorRes['response']['code']
            );
        }

        return response()->json(
            [
                'status' => '200',
                'data' => $response,
                'message' => 'success'
            ],
            200
        );
    }
}
