<?php

namespace App\Http\Controllers\API;

use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function petStore(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        try {

            $response = [
                'name' => $payload['name'],
            ];

            Pet::create([$response]);

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

    public function owners()
    {
        $allOwners = Owner::all();

        if ($allOwners->isEmpty()) {
            return 'no owners found';
        }

        return response()->json($allOwners);
    }

    public function ownerStore(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

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
