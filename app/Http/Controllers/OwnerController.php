<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function createOwner() {
        return view('owner.create');
    }

    public function storeOwner(Request $request) {
        return 'hello world';
    }

}
