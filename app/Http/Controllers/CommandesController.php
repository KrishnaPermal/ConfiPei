<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommandesController extends Controller
{
    public function pushPanier(Request $request){

        $validator = Validator::make(
            $request->input(),
            [
                "order" => "required",
            ],
        )->validate();

        return $validator;




    }
}
